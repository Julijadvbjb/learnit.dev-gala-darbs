<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Contracts\Activity;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Auth;
use App\Models\Assignment;
use Illuminate\Http\RedirectResponse;

use App\Http\Controllers\Auth\RegisteredUserController;

class CourseController extends Controller
{
    public function index()
{
    $categories = Category::all();
    $selectedCategories = request()->get('categories') ?? [];

    $courses = Course::when($selectedCategories, function($query) use ($selectedCategories) {
        $query->whereIn('category_id', $selectedCategories);
    })->get();

    return view('course.list', compact('categories', 'courses', 'selectedCategories'));
}
    
public function filter(Request $request)
{
    $selectedCategories = $request->input('categories');
    $courses = Course::whereIn('category_id', $selectedCategories)->get();

    return view('course.filtered-list', compact('courses'));
}

public function show(Course $course): View
{
    $course->load(['lecturer', 'category']);  // Eager load relationships

    $assignments = $course->assignments;
    return view('course.show', ['course' => $course, 'assignments' => $assignments]);
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

    public function edit(int $course): View
    {
        $course = Course::findOrFail($course);
        $categories = Category::orderBy('name')->get();
        $lecturers = Lecturer::orderBy('name')->get();
        $lecturer = $course->lecturer;  // Fetch the lecturer of the course
    
        return view('course.edit', compact('course', 'categories', 'lecturers', 'lecturer'));  // Pass the lecturer into the view
    } 

    
    public function update(Request $request, Course $course)
{
    $validatedData = $request->validate([
        'name' => 'required|min:3|max:100',
        'category_id' => 'required|exists:categories,id',
        'lecturer_id' => 'required|exists:categories,id',
        'description' =>'required|min:3|max:255',
    ]);
    
    $course->name = $validatedData['name'];
    $course->lecturer_id = $validatedData['lecturer_id'];
    $course->description = $validatedData['description'];

    $course->category()->associate($validatedData['category_id']);
    $course->save();
    
    return redirect()->route('course.show', $course);
}   
public function getRouteKeyName()
{
    return 'id';
}

   
    public function showAll(): View
    {
        $courses = Course::orderBy('name')->get();

        return view('course.list', compact('courses'));
    }
    public function destroy($course)
    {
        // Find the course by its ID
        $course = Course::findOrFail($course);

        // Delete the course
        $course->delete();

        // Redirect to a success page or the course list
        return redirect()->route('course.index');
    }
    public function enroll(Course $course)
    {
        $user = auth()->user();
        $user->enrolledCourses()->syncWithoutDetaching([$course->id]);
    
        // Log the activity
        activity()
            ->causedBy($user)
            ->performedOn($course)
            ->withProperties(['ip' => request()->getClientIp(), 'user_agent' => request()->userAgent()])
            ->log($user->name . ' enrolled in ' . $course->name);
    
        return redirect()->back()->with('success', 'You have successfully enrolled in the course.');
    }
public function showEnrolledCourses(): View
{
    $user = auth()->user();

    $courses = $user->enrolledCourses;

    return view('mycourses.show', compact('courses'));
}
public function myCourse(int $course): View
{
    $course = Course::findOrFail($course);

    return view('course.mycourse', compact('course'));
}
public function myAssignments()
{
    $user = Auth::user(); 
    $courses = $user->enrolledCourses; 
    $assignments = collect();

    // Assuming that each course has many assignments
    foreach ($courses as $course) {
        $assignments = $assignments->concat($course->assignments);
    }

    // Return the first course for simplicity
    $course = $courses->first();

    return view('myassignments', ['assignments' => $assignments, 'course' => $course]);
}
public function leaveCourse(Course $course): RedirectResponse
{
    $user = auth()->user();
    
    // Detach the user from the course
    $user->enrolledCourses()->detach($course->id);
    
    // Log the activity
    activity()
        ->causedBy($user)
        ->performedOn($course)
        ->withProperties(['ip' => request()->getClientIp(), 'user_agent' => request()->userAgent()])
        ->log($user->name . ' left the course ' . $course->name);

    return redirect()->route('mycourses.show')->with('success', 'You have successfully left the course.');
}

}
