<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoursesController extends Controller
{
    function CourseIndex()
    {
        return view('Courses');
    }
}
