<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseModel;

class CoursesController extends Controller
{
    function CourseIndex()
    {
        return view('Courses');
    }

    function GetCourses()
    {
        $Courses = json_encode(CourseModel::all());
        return $Courses;
    }
    function DeleteCourse(Request $request)
    {
        $id = $request->id;
        $del = CourseModel::where('id', $id)->delete();
        if ($del) {
            return json_encode(['status' => 'success']);
        }
        return json_encode(['status' => 'failed']);
    }

    function InsertCourse(Request $request)
    {
        $name = $request->name;
        $des = $request->des;
        $fee = $request->fee;
        $class = $request->class;
        $enroll = 0;
        $link = 'Youtube.com';
        $image = 'images/android.jpg';
        $ins = CourseModel::insert(['course_name' => $name, 'course_des' => $des, 'course_fee' => $fee, 'course_totalclass' => $class, 'course_totalenroll' => $enroll, 'course_link' => $link, 'course_img' => $image]);
        if ($ins) {
            return json_encode(['success' => 'True']);
        }
        return json_encode(['success' => 'False']);
    }

    function GetCourseData(Request $request)
    {
        $id = $request->id;
        $course = json_encode(CourseModel::where('id', $id)->first());
        return $course;
    }

    function UpdateCourse(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $des = $request->des;
        $fee = $request->fee;
        $class = $request->class;
        $upd = CourseModel::where('id', $id)->update(['course_name' => $name, 'course_des' => $des, 'course_fee' => $fee, 'course_totalclass' => $class]);
        if ($upd) {
            return json_encode(['success' => 'True']);
        }
        return json_encode(['success' => 'False']);
    }
}
