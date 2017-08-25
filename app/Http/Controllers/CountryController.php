<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    public function index()
    {
    	$countries=Country::all();
    	
        if (!$countries) {
            throw new HttpException(400, "Invalid data");
        }

        return response()->json(
            $countries,
            200
        );
        
    }
    public function store(Request $request)
    {	
        
    	$validator = Validator::make($request->all(), Country::$rules, Country::$messages);
        
        if ($validator->fails()) {
        	return response()->json([
          		'message' => $validator->getMessageBag()->all(), 403
     			] );
        }
        else{
        	Country::create($request->all());
        		return response()->json([
          		'message' => 'Saved successfully', 200
     			] );	
        }	
    	
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), Country::$rules, Country::$messages);
        $country_id = $request->input('country_id');
        $country = Country::find($country_id);
        //$country->name = strtoupper($request->input('name'));
        if ($validator->fails()) {
        	return response()->json([
          		'message' => $validator->getMessageBag()->all(), 403
     			] );
        }
        else{
        	
        	
        	//$country->save();
        	$country->update($request->all());
        	return response()->json([
          		'message' => 'updated successfully', 200
     			] );
        }
        
    }
    public function delete($id)
    {
        
        try {

            Country::find($id)->delete();
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