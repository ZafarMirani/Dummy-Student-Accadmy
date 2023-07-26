<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class Search extends Controller
{
     public function search(Request $request){

        $searchTerm = $request->input('student_url'); 
        $results = Student::where('student_url', '=',  $searchTerm )->get();
        
            return view('Admin.Fees.pay_fees')->with('results',$results);
        
     }
  
}
