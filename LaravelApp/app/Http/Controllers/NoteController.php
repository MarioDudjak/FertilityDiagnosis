<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Test;
class NoteController extends Controller
{
    
    public function getResultFilters($request, $tests) {
       
        if($request->has('season')){
            $tests=$tests->where('season',$request->input('season'));
        }
        if($request->has('age')){
            $tests=$tests->where('age',$request->input('age'));
        }
        if($request->has('disease')){
            $tests=$tests->where('disease',$request->input('disease'));
        }
        if($request->has('trauma')){
            $tests=$tests->where('trauma',$request->input('trauma'));
        }
        if($request->has('surgery')){
            $tests=$tests->where('surgery',$request->input('surgery'));
        }
        if($request->has('fevers')){
            $tests=$tests->where('fevers',$request->input('fevers'));
        }
        if($request->has('alcohol')){
            $tests=$tests->where('alcohol',$request->input('alcohol'));
        }
        if($request->has('smoking')){
            $tests=$tests->where('smoking',$request->input('smoking'));
        }
        if($request->has('sitting')){
            $tests=$tests->where('sitting',$request->input('sitting'));
        }
        
    	return $tests;
	}
        
    public function Results(User $user, Request $request) {
        $tests=Test::orderBy('created_at','desc')->get();
    	return $this->getResultFilters($request, $tests)->toJson();
    }
    
    public function NormalResults(User $user, Request $request) {
        $tests=Test::where('result',0)->orderBy('created_at','desc')->get();
    	return $this->getResultFilters($request, $tests)->toJson();
    }
    
        public function AlteredResults(User $user, Request $request) {
        $tests=Test::where('result',1)->orderBy('created_at','desc')->get();
    	return $this->getResultFilters($request, $tests)->toJson();
    }

   
}
