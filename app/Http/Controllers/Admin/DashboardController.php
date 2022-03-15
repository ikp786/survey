<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Question;
use App\Models\Result;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $data  = compact('title');
        return view('admin.dashboard', $data);
    }

    function logout()
    {
        Auth::logout();
        return redirect('admin')->with('Success', 'logout success');
    }

    function surveyList()
    {
        $title    = 'Survey List';
        $surveys  = Survey::where('user_type', 'creater')->OrderBy('id', 'desc')->get();
        $data     = compact('title', 'surveys');
        return   view('admin.surveys.index', $data);
    }

    function surveyResult($id)
    {
        $title    = 'Survey Result';        
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
                $input_result[$value->id]['option_type']  = $value->options->type;
            }
        }
        $data = compact('results', 'input_result','title');
        // }
        // dd($data);  
        return view('admin.surveys.result', $data);
    }

    public function contactUsIndex()
    {
        $title     = 'Contact us';
        $contacts  = ContactUs::latest()->get();
        $data      = compact('title','contacts');
        return view('admin.contact-us',$data);
    }
}
