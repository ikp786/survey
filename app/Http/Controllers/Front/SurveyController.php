<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;
use Validator;

class SurveyController extends Controller
{
    public function saveSurveyUniqueIdByCreator(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'unique_id' => 'required|unique:surveys,unique_id,NULL,id,deleted_at,NULL'
        ]);
        if ($validator->passes()) {
            $id = Survey::create(['unique_id' => $request->unique_id, 'user_type' => 'creater']);
            return response()->json(['success' => 'Added new records.', 'survey_id' => $id->id]);
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }

    public function createServey($id = null)
    {
        // echo $id.'<br>';die;
        $survey = Survey::where('id', $id)->first();
        // dd($survey);
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
        ]);
        if ($validator->passes()) {
            $data           =  $request->only('email', 'question_type', 'end_date', 'number_of_attempt');
            $data['link']   =  asset('start-survey/' . $request->unique_id);
            $survey = Survey::where('unique_id', $request->unique_id)->update($data);
            return response()->json(['success' => 'Survey created success.', 'data' => $data['link']]);
        }
        return response()->json(['error' => $validator->errors()->first()]);
    }

    public function startServey($unique_id = '')
    {
        $survey = Survey::where(['unique_id' => $unique_id, 'user_type' => 'creater'])->first();
        // dd($survey);
        if (empty($survey)) {
            return redirect()->route('index')->with('Failed', 'Sorry! something wrong.');
        }
        $questions      = Question::where('type', $survey->question_type)->get();
        $title          = 'Start Survey';       
        $data           = compact('title', 'questions', 'survey');
        return view('front.start-survey', $data);
    }

    public function quizStart(Request $request)
    {
        echo 'dsfd';
        $this->validate($request,[
            'email'       => 'required|email',
            'unique_id'   => 'required|exists:surveys,unique_id',
         ]);


    }
}
