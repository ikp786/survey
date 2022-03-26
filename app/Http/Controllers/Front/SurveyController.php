<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Question;
use App\Models\Result;
use App\Models\Suggestion;
use App\Models\Survey;
use Illuminate\Http\Request;
use Validator;

class SurveyController extends Controller
{
    public function saveSurveyUniqueIdByCreator(Request $request)
    {
        $yesterDay =  date('Y-m-d H:i:s', strtotime("-2 days")); //yesterday date        

        $validator = Validator::make($request->all(), [
            // 'unique_id'          => 'required|unique:surveys,unique_id,NULL,id,deleted_at,NULL'
            'unique_id'          => 'required'
        ], ['unique_id.required' => " *the unique id field is required"]);
        $chekExist = Survey::where('unique_id', $request->unique_id)->whereBetween('created_at', [$yesterDay, date('Y-m-d H:i:s')])->where('user_type', 'creater')->count();
        if ($chekExist > 0) {
            $err = ['*The unique id has already been taken.'];
            return response()->json(['error' => $err]);
        }
        if ($validator->passes()) {
            // $id = Survey::create(['unique_id' => $request->unique_id, 'user_type' => 'creater']);
            return response()->json(['success' => 'Added new records.', 'survey_id' => $request->unique_id]);
        }

        return response()->json(['error' => $validator->errors()->all()]);
    }

    public function createServey($id = null)
    {
        // $survey = Survey::where('unique_id', $id)->first();
        if (empty($survey)) {
            // return redirect()->route('index')->with('Failed', 'Sorry! something wrong.');
        }
        // dd($survey);
        $unique_id            = $id;
        $title                = 'Create Servey';
        $questions            = Question::all();
        $basicQuestion_count  = Question::where('type', 'basic')->count();
        $data                 = compact('title', 'unique_id', 'questions', 'basicQuestion_count');
        return view('front.create-servey', $data);
    }

    public function saveSurveyByCreator(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'unique_id'         => 'required',
            'email'             => 'required|email',
            'question_type'     => 'required|In:basic,advance',
            // 'end_date'          => 'required|date|after_or_equal:today',
            'number_of_attempt' => 'required|integer|digits_between:1,10|min:3'
        ], [
            'unique_id.required'            => "* The unique id field is required.",
            'email.required'                => "* The Email field is required.",
            'number_of_attempt.required'    => "* number of participants should be a numerical value",
            'number_of_attempt.min'         => "The minimum participant should not be less than 3",
            'number_of_attempt.digits_between' => "The minimum participant should not be less than 3",
            'email.email'                   => "please enter a valid email address"
        ]);
        if ($validator->passes()) {
            $data               =  $request->only('email', 'question_type', 'end_date', 'number_of_attempt', 'unique_id');
            $data['link']       =  asset('start-survey/' . $request->unique_id);
            $data['ip_address'] =  $this->get_client_ip();
            $survey = Survey::create($data);
            // $survey = Survey::where('unique_id', $request->unique_id)->update($data);
            return response()->json(['success' => 'Survey created success.', 'data' => $data['link']]);
        }
        return response()->json(['error' => $validator->errors()->first()]);
    }



    public function checkSurveyUniqueIdByTaker(Request $request)
    {

        $unique_id = $request->unique_id;

        $yesterDay =  date('Y-m-d H:i:s', strtotime("-1 days")); //yesterday date        
        $chekSurveyExpire = Survey::where(['unique_id' => $unique_id])->orderBy('created_at', 'desc')->first();
        if (empty($chekSurveyExpire)) {
            return response()->json(['error' => '* Session Id not found']);
        }
        $ip = $this->get_client_ip();
        $chekExist = Survey::where(['id' => $chekSurveyExpire->id, 'ip_address' => $ip, 'unique_id' => $unique_id, 'user_type' => 'taker'])->orderBy('created_at', 'desc')->first();
        $chekSurveyComplete = Survey::where(['unique_id' => $unique_id, 'user_type' => 'creater'])->orderBy('created_at', 'desc')->first();
        $survey = Survey::where(['unique_id' => $unique_id, 'user_type' => 'creater'])->orderBy('created_at', 'desc')->first();
        if (trim($unique_id) == '') {
            return response()->json(['error' => '* The unique id field is required.']);
        } elseif (empty($survey)) {
            return response()->json(['error' => '* Session Id not found']);
        } elseif (!empty($chekExist)) {
            return response()->json(['error' => '* this survey has been  already taken.']);
        } elseif ($chekSurveyComplete->is_complete == 1) {
            return response()->json(['error' => '* this survey has been  closed.']);
        } else if ($chekSurveyExpire->created_at < $yesterDay) {
            return response()->json(['error' => '* this survey has been  Expired.']);
        }
    }

    function get_client_ip()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public function startServey(Request $request, $unique_id = '')
    {
        if ($request->unique_ids) {
            $unique_id = $request->unique_ids;
        }
        $yesterDay =  date('Y-m-d H:i:s', strtotime("-1 days")); //yesterday date
        // echo $yesterDay;die;
        $chekSurveyExpire = Survey::where(['unique_id' => $unique_id])->orderBy('created_at', 'desc')->first();
        $ip = $this->get_client_ip();
        $chekExist = Survey::where(['id' => $chekSurveyExpire->id, 'ip_address' => $ip, 'unique_id' => $unique_id, 'user_type' => 'taker'])->orderBy('created_at', 'desc')->count();
        $chekSurveyComplete = Survey::where(['unique_id' => $unique_id, 'user_type' => 'creater'])->orderBy('created_at', 'desc')->first();
        $survey = Survey::where(['unique_id' => $unique_id, 'user_type' => 'creater'])->orderBy('created_at', 'desc')->first();
        if (empty($survey)) {
            return redirect()->route('index')->with('Failed', 'Session Id not found');
        } elseif ($chekExist > 0) {
            return redirect()->route('index')->with('Failed', 'Sorry! this survey has been  already taken.');
        } elseif ($chekSurveyComplete->is_complete == 1) {
            return redirect()->route('index')->with('Failed', 'Sorry! this survey has been  closed.');
        } else if ($chekSurveyExpire->created_at < $yesterDay) {
            return redirect()->route('index')->with('Failed', 'Sorry! this survey has been  Expired.');
        }
        if ($survey->question_type == 'basic') {
            $questions      = Question::where('type', $survey->question_type)->get();
        } else {
            $questions      = Question::get();
        }

        $title          = 'Start Survey';
        $data           = compact('title', 'questions', 'survey');
        return view('front.start-survey', $data);
    }

    public function quizStart(Request $request)
    {
        $this->validate($request, [
            'email'       => 'required|email',
            'unique_id'   => 'required|exists:surveys,unique_id',
        ]);
        $checkExist        = Survey::where(['unique_id' => $request->unique_id, 'email' => $request->email])->count();
        if ($checkExist > 0) {
            return redirect()->back()->with('Failed', 'Sorry! * The Email already  taken.');
        }
        $survery        = Survey::where('unique_id', $request->unique_id)->where('user_type', 'creater')->orderBy('created_at', 'desc')->first();
        if ($survery->question_type == 'basic') {
            $questions      = Question::with('options')->where('type', 'basic')->get();
        } else {
            $questions      = Question::with('options')->get();
        }
        $ip = $this->get_client_ip();
        $suggestions         = Suggestion::pluck('title');
        $survey_taker_id     = Survey::create(
            [
                'email'          => $request->email,
                'ip_address'     => $ip,
                'unique_id'      => $request->unique_id,
                'user_type'      => 'taker',
                'survey_id'      => $survery->id,
                'question_type'  => $survery->question_type
            ]
        )->id;
        $title          = 'Start Quiz';
        $unique_id      = $request->unique_id;
        $data           =  compact('title', 'questions', 'survery', 'survey_taker_id', 'unique_id', 'suggestions');
        return view('front.quiz', $data);
    }


    public function quizStartSelf(Request $request)
    {
        $this->validate($request, [
            'email'       => 'required|email',
            'unique_id'   => 'required|exists:surveys,unique_id',
        ]);
        $survery        = Survey::where('unique_id', $request->unique_id)->where('user_type', 'creater')->orderBy('created_at', 'desc')->first();
        if ($survery->question_type == 'basic') {
            $questions      = Question::with('options')->where('type', 'basic')->get();
        } else {
            $questions      = Question::with('options')->get();
        }

        $ip = $this->get_client_ip();
        $suggestions         = Suggestion::pluck('title');
        // dd($suggestions);
        $survey_taker_id     = Survey::create(
            [
                'email'          => $request->email,
                'ip_address'     => $ip,
                'unique_id'      => $request->unique_id,
                'user_type'      => 'taker',
                'survey_id'      => $survery->id,
                'question_type'  => $survery->question_type
            ]
        )->id;
        $title          = 'Start Quiz';
        $unique_id      = $request->unique_id;
        $data           =  compact('title', 'questions', 'survery', 'survey_taker_id', 'unique_id','suggestions');

        return view('front.quiz', $data);
    }

    // public function saveOptionQuiz(Request $request)
    // {
    //     if ($request->ajax()) {

    //         $survery  = Survey::where('id', $request->survey_creater_id)->first();
    //         $option   = Option::where('id', $request->question_id)->first();

    //         $result                        =  new Result();
    //         $result->survey_creater_id     =  $request->survey_creater_id;
    //         $result->survey_taker_id       =  $request->survey_taker_id;
    //         $result->question_id           =  $request->question_id;
    //         $result->option_id             =  $request->option_id;
    //         $result->question_type         =  $survery->question_type;
    //         $result->option_type           =  $option->type;
    //         $result->option_value          =  $request->option_value;
    //         $result->save();

    //         return response()->json(['success' => 'Survey save success.']);
    //     }
    // }

    public function saveQuiz(Request $request)
    {
        $survery  = Survey::find($request->survey_creater_id);
        $ip = $this->get_client_ip();
        $survery_taker_update = Survey::find($request->survey_taker_id)->update(['ip_address' => $ip, 'is_complete' => 1]);
        foreach ($request->question as $key => $value) {
            $option   = Option::where('question_id', $value)->first();
            $result                        =  new Result();
            $result->survey_creater_id     =  $request->survey_creater_id;
            // $result->survey_id             =  $request->survey_creater_id;
            $result->survey_taker_id       =  $request->survey_taker_id;
            $result->question_id           =  $value;
            $result->option_id             =  $option->id;
            $result->question_type         =  $option->question_type;
            $result->option_type           =  $option->type;
            // $result->is_complete              =  1;
            $result->option_value          =  isset($request->answer[$key]) ? $request->answer[$key] : '';
            $result->save();
        }

        $survery_taker = Survey::where('survey_id', $survery->id)->where('is_complete', 1)->get();
        if (count($survery_taker) >= $survery->number_of_attempt) {
            foreach ($survery_taker as $key => $value) {
                // $this->surveyCreaterResult($survery->id, $value->email);
                $value->is_email_sent = 1;
                $value->save();
            }
            $survery->is_email_sent = 1; 
            $survery->is_complete = 1;
            $survery->save();
            $this->surveyCreaterResult($survery->id, $survery->email);
        }
        return redirect()->route('front.thanks');
    }

    public function results($id, $email)
    {
        $surverys    =  Survey::find($id);
        if ($surverys->question_type == 'basic') {
            $questions   =  Question::with('options')->where(['type' => $surverys->question_type])->get();
        } else {
            $questions   =  Question::with('options')->get();
        }
        $results     =  [];
        foreach ($questions as $key => $value) {
            if ($value->options->type == 'dropdown' || $value->options->type == 'radio') {
                $results[$value->id]['question'] = $value->question;
                $options  = json_decode($value->options->value, true);
                $new = [];
                foreach ($options as $key2 => $value2) {
                    $result  = Result::where(['question_id' => $value->id, 'option_id' => $value->options->id, 'option_value' => $value2, 'survey_creater_id' => $surverys->id])->count();
                    $abc = array('count' => $result, 'value' => $value2);
                    $results[$value->id][$value->options->id][] = $abc;
                }
            }
        }
        if (!empty($results)) {
            \Mail::to($email)->send(new \App\Mail\SurveyTakerMail($results));
        }
    }

    public function surveyCreaterResult($id, $email = null)
    {
        // $email       =  isset($email) ? $email : 'khanebrahim643@gmail.com';
        $surverys    =  Survey::find($id);
        if ($surverys->question_type == 'basic') {
            $questions   =  Question::with('options')->where(['type' => $surverys->question_type])->get();
        } else {
            $questions   =  Question::with('options')->get();
        }
        $results        =  [];
        $input_result   =  [];
        foreach ($questions as $key => $value) {
            if ($value->options->type == 'dropdown' || $value->options->type == 'radio') {
                $results[$value->id]['question'] = $value->question;
                $options  = json_decode($value->options->value, true);
                $new = [];
                foreach ($options as $key2 => $value2) {
                    $result  = Result::where(['question_id' => $value->id, 'option_id' => $value->options->id, 'option_value' => $value2, 'survey_creater_id' => $surverys->id])->count();
                    $abc = array('count' => $result, 'value' => $value2);
                    $results[$value->id][$value->options->id][] = $abc;
                }
            } else {
                $result  = Result::where(['question_id' => $value->id, 'survey_creater_id' => $surverys->id])->pluck('option_value');
                $input_result[$value->id]['question']       = $value->question;
                $input_result[$value->id]['ans']            = $result;
                $input_result[$value->id]['option_type']    = $value->options->type;
            }
        }
        // dd($results);
        if (!empty($results) && !empty($input_result)) {
            $data = ['results' => $results, 'input_result' => $input_result];
            \Mail::to($email)->send(new \App\Mail\SurveyCreaterMail($data));
        }
        // return view('email.surevy_creator_email', compact('data'));
    }

    public function surveyResultCronJob()
    {
        $yesterDay =  date('Y-m-d H:i:s', strtotime("-1 days"));
        $survery_complete = Survey::where('is_email_sent', 0)->where('created_at', '<', $yesterDay)->get();
        // dd($survery_complete);
        if (!empty($survery_complete)) {
            foreach ($survery_complete as $key => $survery) {
                $survery_taker = Survey::where('survey_id', $survery->id)->get();
                foreach ($survery_taker as $key => $value) {
                    $this->surveyCreaterResult($survery->id, $value->email);
                    $value->is_email_sent = 1;
                    $value->save();
                }
                $survery->is_email_sent = 1;
                $survery->is_complete = 1;
                $survery->save();
                $this->surveyCreaterResult($survery->id, $survery->email);
            }
        }
    }

    public function testorderByAsc()
    {

        $data  = Option::orderBy('id', 'desc')->first();
        $dd = (json_decode($data->value));
        sort($dd);
        $clength = count($dd);
        for ($x = 0; $x < $clength; $x++) {
            $ddd[] = $dd[$x];
        }
        $data->value = json_encode($ddd);
        $data->save();
    }
}
