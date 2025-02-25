<?php

namespace App\Http\Controllers\Admin\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    public function approvalCourses()
    {
        $approvalCourses = Course::where('status', 'approved')->get();
        return view('dashboard.courses.approval', compact('approvalCourses'));
    }
    public function pendingCourses()
    {
        $pendingCourses = Course::where('status', 'pending')->get();
        return view('dashboard.courses.pending', compact('pendingCourses'));
    }

    public function approvedCourses($id)
    {
        Course::where('id', $id)->update(['status' => 'approved']);
        return redirect()->back();
    }

    public function rejectedCourses($id)
    {
        Course::where('id', $id)->delete();
        return redirect()->back();
    }
}
