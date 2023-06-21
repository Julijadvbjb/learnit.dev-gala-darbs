<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Assignment;
use App\Models\User;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{
    /**
     * Display a listing of the courses.
     */
    public function index()
    {
        $courses = Course::all();

        return view('course.list', compact('courses'));
    }

    /**
     * Show the details of a specific course identified by ID.
     */
    public function show(int $id): View
    {
        $course = Course::findOrFail($id);
        $assignments = $course->assignments; // Retrieve the assignments for the course
    
        return view('course.show', compact('course', 'assignments'));
    }
    


    /**
     * Show the form for creating a new course.
     */
   
    
     public function create()
     {
         $categories = Category::all();
         $course = null; 
         return view('course.create', compact('categories', 'course'));
     }
     
    
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required',
             'category' => 'required|exists:categories,id',
             'lecturer' => 'required',
             'duration' => 'required',
             'description' => 'required',
         ]);
     
         Course::create([
             'name' => $request->name,
             'category_id' => $request->category,
             'lecturer' => $request->lecturer,
             'duration' => $request->duration,
             'description' => $request->description,
         ]);
     
         return redirect()->route('course.index')->with('success', 'Course created successfully!');
     }
     
    
    /**
     * Show the form for editing a specific course identified by ID.
     */
    public function edit(int $id): View
    {
        $course = Course::findOrFail($id);
        $categories = Category::orderBy('name')->get();

        return view('course.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified course in storage.
     */
    public function update(Request $request, int $id)
    {
        $course = Course::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'category_id' => 'required|exists:categories,id',
            'lecturer' => 'required|min:5|max:50',
            'duration' => 'required',   #change to start date , end date later...........
            'description' =>'required|min:3|max:200',
        ]);
        
        $course->name = $validatedData['name'];
        $course->lecturer = $validatedData['lecturer'];
        $course->duration = $validatedData['duration'];
        $course->description = $validatedData['description'];

        $course->category()->associate($validatedData['category_id']);
        $course->save();
        
        return redirect()->route('course.show', ['id' => $course->id])->with('success_message', 'Course was updated successfully!');
    }   

    /**
     * Show all courses.
     */
    public function showAll(): View
    {
        $courses = Course::orderBy('name')->get();

        return view('course.list', compact('courses'));
    }

    /**
     * Remove the specified course from storage.
     */
    public function destroy($id)
    {
        // Find the course by its ID
        $course = Course::findOrFail($id);

        // Delete the course
        $course->delete();

        // Redirect to a success page or the course list
        return redirect()->route('course.index')->with('success', 'Course deleted successfully!');
    }
}
