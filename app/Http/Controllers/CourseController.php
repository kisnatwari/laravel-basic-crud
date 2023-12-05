<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|unique:courses',
            'description' => 'required|string',
        ]);
    
        $file = $request->file('file');
        $filename = Str::random(8) . $file->getClientOriginalName();
        $path = $file->store('/public/courses');
    
        $course = Course::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'file' => $path,
        ]);
    
        return redirect()->back()->with('success', 'Course has been uploaded successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('course-view', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('edit-course', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|unique:courses,title,' . $course->id,
            'description' => 'required|string',
        ]);
    
        $course->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);
    
        return redirect()->back()->with('success', 'Course has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        Storage::delete('courses/' . $course->file);
        $course->delete();
    
        return redirect()->back()->with('success', 'Course has been deleted successfully');
    }
}
