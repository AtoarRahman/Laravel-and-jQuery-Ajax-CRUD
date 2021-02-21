<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;

class AjaxController extends Controller
{
    public function getStudentData(){
		return $result = json_encode(Student::all());
    } 
}
