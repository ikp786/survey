<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{

    public function index()
    {
        $title          = 'suggestions';
        $suggestions    = Suggestion::all();
        $data           =  compact('title','suggestions');
        return view('admin.suggestions.index', $data);
    }
    public function create()
    {
        $title  = 'suggestions';
        $data   =  compact('title');

        return view('admin.suggestions.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
        ]);
        Suggestion::create($request->only('title'));
        return redirect()->route('admin.suggestions.index')->with('success', 'Suggestions add success');
    }

    public function edit($id)
    {
        $suggestions    = Suggestion::find($id);
        $title          = 'suggestions';
        $data           = compact('suggestions', 'title');
        return view('admin.suggestions.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
        ]);

        Suggestion::find($id)->update($request->only('title'));
        return redirect()->route('admin.suggestions.index')->with('Sucess', 'update success.');
    }

    public function destroy($id)
    {
        Suggestion::find($id)->delete();
        return redirect()->back()->with('Success', 'deleted successfully');
    }
}