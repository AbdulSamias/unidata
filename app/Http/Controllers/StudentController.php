<?php

namespace App\Http\Controllers;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function student_universities()
    {
        $universities = University::all();
        return view('institution.student-universities',compact('universities'));
    }
    function student_dashboard(){
        return view('institution.student-dashboard');
    }
}
