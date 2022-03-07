<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Question;
use App\Models\Result;
use App\Models\Survey;
use Illuminate\Http\Request;
use Validator;

class SurveyController extends Controller
{
    public function saveSurveyUniqueIdByCreator(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'unique_id' => 'required|unique:surveys,unique_id,NULL,id,deleted_at,NULL'
        ], ['unique_id.required' => "* The unique id field is required."]);
        if ($validator->passes()) {
            $id = Survey::create(['unique_id' => $request->unique_id, 'user_type' => 'creater']);
            return response()->json(['success' => 'Added new records.', 'survey_id' => $id->id]);
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }

    public function createServey($id = null)
    {
        $survey = Survey::where('id', $id)->first();
        if (empty($survey)) {
            return redirect()->route('index')->with('Failed', 'Sorry! something wrong.');
        }
        $unique_id    = $survey->unique_id;
        $title      = 'Create Servey';
        $questions  = Question::all();
        $data       = compact('title', 'unique_id', 'questions');
        return view('front.create-servey', $data);
    }

    public function saveSurveyByCreator(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'unique_id'         => 'required|exists:surveys,unique_id',
            'email'             => 'required|email|unique:surveys,email',
            'question_type'     => 'required|In:basic,advance',
            'end_date'          => 'required|date|after_or_equal:today',
            'number_of_attempt' => 'required|integer|digits_between:1,10'
        ], [
            'unique_id.required' => "* The unique id field is required.",
            'email.required' => "* The Email field is required."
        ]);
        if ($validator->passes()) {
            $data           =  $request->only('email', 'question_type', 'end_date', 'number_of_attempt');
            $data['link']   =  asset('start-survey/' . $request->unique_id);
            $survey = Survey::where('unique_id', $request->unique_id)->update($data);
            return response()->json(['success' => 'Survey created success.', 'data' => $data['link']]);
        }
        return response()->json(['error' => $validator->errors()->first()]);
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

    public function startServey($unique_id = '')
    {
        $ip = $this->get_client_ip();
        $chekExist = Survey::where(['ip_address' => $ip, 'unique_id' => $unique_id])->count();

        $survey = Survey::where(['unique_id' => $unique_id, 'user_type' => 'creater'])->first();
        if (empty($survey)) {
            return redirect()->route('index')->with('Failed', 'Sorry! Survey not found.');
        } elseif ($chekExist > 0) {
            return redirect()->route('index')->with('Failed', 'Sorry! this servey has been  already taken.');
        }


        $questions      = Question::where('type', $survey->question_type)->get();
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
        $survery        = Survey::where('unique_id', $request->unique_id)->first();
        $questions      = Question::with('options')->where('type', 'basic')->get();

        $ip = $this->get_client_ip();

        $survey_taker_id     = Survey::create(
            [
                'email'       => $request->email,
                'ip_address'  => $ip,
                'unique_id'   => $request->unique_id,
                'user_type'   => 'taker',
                'survey_id'   => $survery->id
            ]
        )->id;
        $title          = 'Start Quiz';
        $data           =  compact('title', 'questions', 'survery', 'survey_taker_id');

        return view('front.quiz', $data);
    }

    public function saveOptionQuiz(Request $request)
    {
        if ($request->ajax()) {

            $survery  = Survey::where('id',$request->survey_creater_id)->first();
            $option   = Option::where('id',$request->question_id)->first();

            $result                        =  new Result();
            $result->survey_creater_id     =  $request->survey_creater_id;
            $result->survey_taker_id       =  $request->survey_taker_id;
            $result->question_id           =  $request->question_id;
            $result->option_id             =  $request->option_id;
            $result->question_type         =  $survery->question_type;
            $result->option_type           =  $option->type;
            $result->option_value          =  $request->option_value;
            $result->save();

            return response()->json(['success' => 'Survey save success.']);
        }
    }

    public function saveQuiz(Request $request)
    {
        return $request->all;
        $update   = Survey::find($request->survey_taker_id)->update([
            'is_compelte'   => 1
        ]);
        return redirect()->route('index')->with('Success', 'Survey complete.');
    }
}