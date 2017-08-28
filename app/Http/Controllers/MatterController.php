<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Matter;

class MatterController extends Controller
{
    public function index()
    {
        $matters=Matter::all();
    	
        if (!$matters) {
            throw new HttpException(400, "Invalid data");
        }

        return response()->json(
            $matters,
            200
        );
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), Matter::$rules, Matter::$messages);
        
        if ($validator->fails()) {
        	return response($validator->getMessageBag()->all(), 403
     			)->header('Content-Type', 'application/json');
        }
        else{
        	Matter::create($request->all());
        		return response()->json([
          		'message' => 'Saved successfully', 200
     			] );	
        }	
       
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), Matter::$rules, Matter::$messages);
        $matter_id = $request->input('id');
        $matter = Matter::find($matter_id);
        
        if ($validator->fails()) {
            return response($validator->getMessageBag()->all(), 403
            )->header('Content-Type', 'application/json');        	
        }
        else{
        	
        	$matter->update($request->all());
        	return response()->json([
          		'message' => 'updated successfully', 200
     			] );
        }
    }
    public function delete($id)
    {
        try {
            
            Matter::find($id)->delete();
                    return response()->json([
                            'message' => 'delete successfully', 200
                    ] );
            
                }catch (\Illuminate\Database\QueryException $e){
                    return response()->json([
                            'message' => 'error data relation', 403
                    ] );
                        
                }
    }
}
