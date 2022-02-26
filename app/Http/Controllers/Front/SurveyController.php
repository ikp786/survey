<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use Illuminate\Http\Request;
use Validator;

class SurveyController extends Controller
{
    public function saveSurveyUniqueIdByCreator(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'unique_id'         => 'required|unique:surveys,unique_id,0,id,deleted_at,' . null,
            // 'name' => 'required|min:1|unique:versions,name,NULL,id,deleted_at,NULL',
            'unique_id' => 'required|unique:surveys,unique_id,NULL,id,deleted_at,NULL'
        ]);
     
        if ($validator->passes()) {
            Survey::create(['unique_id' => $request->unique_id,'user_type' => 'creater']);
            return response()->json(['success'=>'Added new records.']);
        }
     
        return response()->json(['error'=>$validator->errors()->all()]);
    }
}