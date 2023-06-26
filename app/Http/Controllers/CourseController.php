<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Assignment;
use App\Models\Lecturer;
use App\Models\User;
use App\Models\Enrollment;


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
    public function show(Course $course): View
{
    $assignments = $course->assignments; // Retrieve the assignments for the course

    return view('course.show', compact('course', 'assignments'));
}

    
    public function create()
{
    $categories = Category::all();
    $lecturers = Lecturer::all();
    $course = new Course(); // Create a new Course instance
    
    return view('course.create', compact('categories', 'course', 'lecturers'));
}

     
    
     public function store(Request $request)
{
    $request->validate([
        'name' => 'required|min:3|max:100',
        'category' => 'required|exists:categories,id',
        'lecturer_id' => 'required|exists:lecturers,id',  // validate lecturer_id
        'description' => 'required|min:3|max:255',
    ]);

    Course::create([
        'name' => $request->name,
        'category_id' => $request->category,
        'lecturer_id' => $request->lecturer_id,  // make sure to save lecturer_id
        'description' => $request->description,
    ]);

    return redirect()->route('course.index');
}

     
    
    /**
     * Show the form for editing a specific course identified by ID.
     */
    public function edit(int $id): View
    {
        $course = Course::findOrFail($id);
        $categories = Category::orderBy('name')->get();
        $lecturers = Lecturer::orderBy('name')->get();
        $lecturer = $course->lecturer;  // Fetch the lecturer of the course
    
        return view('course.edit', compact('course', 'categories', 'lecturers', 'lecturer'));  // Pass the lecturer into the view
    }
    

    /**
     * Update the specified course in storage.
     */
    public function update(Request $request, int $id)
    {
        $course = Course::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:100',
            'category_id' => 'required|exists:categories,id',
            'lecturer_id' => 'required|exists:categories,id',
            'description' =>'required|min:3|max:255',
        ]);
        
        $course->name = $validatedData['name'];
        $course->lecturer_id = $validatedData['lecturer_id'];
        $course->save();

        $course->description = $validatedData['description'];

        $course->category()->associate($validatedData['category_id']);
        $course->save();
        
        return redirect()->route('course.show', ['id' => $course->id]);
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
    public function enroll(Course $course)
    {
        auth()->user()->enrolledCourses()->syncWithoutDetaching([$course->id]);
    
        return redirect()->back()->with('success', 'You have successfully enrolled in the course.');
    }
    
  /**
 * Show the courses the authenticated user is enrolled in.
 */
public function showEnrolledCourses(): View
{
    // Get the currently authenticated user
    $user = auth()->user();

    // Fetch the courses the user is enrolled in
    $courses = $user->enrolledCourses;

    // Return a view with the courses data
    return view('mycourses.show', compact('courses'));
}
public function myCourse(int $id): View
{
    // Fetch the course by its ID
    $course = Course::findOrFail($id);

    // Return a view, passing in the course
    return view('course.mycourse', compact('course'));
}

}
