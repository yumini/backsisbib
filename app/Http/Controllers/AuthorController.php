<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors=Author::all();
    	
        if (!$authors) {
            throw new HttpException(400, "Invalid data");
        }

        return response()->json(
            $authors,
            200
        );
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), Author::$rules, Author::$messages);
        
        if ($validator->fails()) {
        	return response($validator->getMessageBag()->all(), 403
     			)->header('Content-Type', 'application/json');
        }
        else{
        	Author::create($request->all());
        		return response()->json([
          		'message' => 'Saved successfully', 200
     			] );	
        }	
       
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), Author::$rules, Author::$messages);
        $author_id = $request->input('id');
        $author = Author::find($author_id);
       
        if ($validator->fails()) {
            return response($validator->getMessageBag()->all(), 403
            )->header('Content-Type', 'application/json');        	
        }
        else{
        	
        	$author->update($request->all());
        	return response()->json([
          		'message' => 'updated successfully', 200
     			] );
        }
    }
    public function delete($id)
    {
        try {
            
                Author::find($id)->delete();
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
