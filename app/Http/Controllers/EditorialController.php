<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Editorial;

class EditorialController extends Controller
{
    public function index()
    {
        $editorials=Editorial::with(['country'])
    	->get();
        if (!$editorials) {
            throw new HttpException(400, "Invalid data");
        }

        return response()->json(
            $editorials,
            200
        );
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), Editorial::$rules, Editorial::$messages);
        
        if ($validator->fails()) {
        	return response($validator->getMessageBag()->all(), 403
     			)->header('Content-Type', 'application/json');
        }
        else{
        	Editorial::create($request->all());
        		return response()->json([
          		'message' => 'Saved successfully', 200
     			] );	
        }	
       
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), Editorial::$rules, Editorial::$messages);
        $editorial_id = $request->input('id');
        $editorial = Editorial::find($editorial_id);
        //$editorial->name = strtoupper($request->input('name'));
        if ($validator->fails()) {
            return response($validator->getMessageBag()->all(), 403
            )->header('Content-Type', 'application/json');        	
        }
        else{
        	//$editorial->save();
        	$editorial->update($request->all());
        	return response()->json([
          		'message' => 'updated successfully', 200
     			] );
        }
    }
    public function delete($id)
    {
        try {
            
                Editorial::find($id)->delete();
                    return response()->json([
                            'message' => 'delete successfully', 200
                    ] );
            
                }catch (\Illuminate\Database\QueryException $e){
                    return response()->json([
                            'message' => 'error data relation', 403
                    ] );
                        
                }
    }
    public function search(Request $request) {
        $constraints = [
            'name' => $request['name_search'],
            'country_id' => $request['country_id'],
            'name_city' => $request['city_search']
            ];
        $editorials = $this->doSearchingQuery($constraints);
        //$constraints['name'] = $request['name_search'];
        if (!$editorials) {
            throw new HttpException(400, "Invalid data");
        }

        return response()->json(
            $editorials,
            200
        );
    }

    private function doSearchingQuery($constraints) {
        $query = Editorial::with(['country']);
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where($fields[$index], 'like', '%'.$constraint.'%');
                         
            }

            $index++;
        }
        
        return $query;
    }
}
