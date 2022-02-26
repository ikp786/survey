<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestionCreateRequest;
use App\Http\Requests\Admin\QuestionUpdateRequest;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug = '')
    {
        // echo $slug;die;
        $questions = Question::where('type', $slug)->with('options')->latest()->get();
        $title = 'Questions';
        $data  = compact('questions', 'title');
        return view('admin.questions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateRequest $request)
    {
        try {
        $question = new Question();
        $question->fill($request->only('question', 'type'));
        $question->save();

        $option = new Option();
        $option->question_id     =  $question->id;
        $option->question_type   =  $request->type;
        $option->type            =  $request->select_option_type;

        if ($request->select_option_type == 'dropdown' || $request->select_option_type == 'radio') {
            $data = array_filter($request->option);
            $option->value =  json_encode($data);
        }
        $option->save();
        return redirect()->route('admin.questions')->with('Success', 'Question added success');
    } catch (\Throwable $e) {
        \DB::rollback();
        return redirect()->back()->with(['Failed' => $e->getMessage() . ' on line ' . $e->getLine()]);
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questions  = Question::findOrFail($id);
        $title      = 'Edit Question';
        $data       =  compact('questions', 'title');
        return view('admin.questions.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateRequest $request, $id)
    {
        try {
            $questions  = Question::findOrFail($id);
            $questions->fill($request->only('question', 'type'));
            $questions->save();

            Option::where('question_id', $id)->delete();
            $option = new Option();
            $option->question_id     =  $questions->id;
            $option->question_type   =  $request->type;
            $option->type            =  $request->select_option_type;

            if ($request->select_option_type == 'dropdown' || $request->select_option_type == 'radio') {
                $data = array_filter($request->option);
                $option->value =  json_encode($data);
            }
            $option->save();
            return redirect()->route('admin.question.index', $request->type)->with('Success', 'Question added success');
        } catch (\Throwable $e) {
            \DB::rollback();
            return redirect()->back()->with(['Failed' => $e->getMessage() . ' on line ' . $e->getLine()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Option::where('question_id', $id)->delete();
            $question = Question::find($id);
            $question->delete();
            return redirect()->back()->with(['Success' => "Questions deleted success."]);
        } catch (\Throwable $e) {
            \DB::rollback();
            return redirect()->back()->with(['Failed' => $e->getMessage() . ' on line ' . $e->getLine()]);
        }
    }
}
