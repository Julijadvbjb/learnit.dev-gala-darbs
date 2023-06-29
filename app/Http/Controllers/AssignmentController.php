<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Category;

use App\Http\Controllers\ModelNotFoundException;
use App\Http\Controllers\Session;
use App\Models\User;
use App\Models\Submission;



class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
{
    $assignments = $course->assignments;  // Get assignments related to the specific course
    $categories = Category::all();
    return view('assignments', compact('assignments', 'categories', 'course')); // Don't forget to pass the $course to the view
}


    public function create(Course $course)
    {
        return view('assignmentscreate', compact('course'));
    }

public function store(Request $request, Course $course)
{
    $request->validate([
        'title' => 'required|min:3|max:50',
        'task' => 'required|min:5|max:255',
        'assignment_file' => 'file|max:5000'
    ]);

    $data = $request->only(['title', 'task']);

    if ($request->hasFile('assignment_file')) {
        $path = $request->file('assignment_file')->store('assignments');
        $data['file_path'] = $path;
    }

    $assignment = new Assignment($data);
    $course->assignments()->save($assignment);

    return redirect()->route('assignments.index', ['course' => $course]);
}

public function show(Assignment $assignment)
{
    $course = $course = $assignment->course; // Get the course that the assignment belongs to

    return view('assignments.show', compact('assignment', 'course')); // Pass the course to the view
}


    public function edit($id)
{
    $assignment = Assignment::findOrFail($id);

    return view('edit', compact('assignment'));
}

public function update(Request $request, $id)
{
    $assignment = Assignment::findOrFail($id);

    $request->validate([
        'title' => 'required|min:3|max:50',
        'task' => 'required|min:5|max:255',
        'assignment_file' => 'file|max:5000'
    ]);

    $data = $request->only(['title', 'task']);

    if ($request->hasFile('assignment_file')) {
        $path = $request->file('assignment_file')->store('assignments');
        $data['file_path'] = $path;
    }

    $assignment->update($data);

    return redirect()->route('assignments.show', ['assignment' => $assignment->id]);
}
public function destroy($id)
{
    $assignment = Assignment::findOrFail($id);
    $course_id = $assignment->course->id; // assuming there is a relationship defined
    $assignment->delete();

    return redirect()->route('assignments.index', ['course' => $course_id]);
}
    public function download($id)
    {
        $assignment = Assignment::findOrFail($id);
    
        // Make sure an assignment file exists
        if ($assignment->file_path) {
            return response()->download(storage_path('app/' . $assignment->file_path));
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
    }
    public function submit(Assignment $assignment, Request $request)
{
    $validatedData = $request->validate([
        'submission' => 'required|mimes:pdf,doc,docx|max:2048',
    ]);

    if ($request->hasFile('submission')) {
        $file = $request->file('submission');
        $filename = $file->getClientOriginalName();
        $file->storeAs('submissions', $filename); // Store the submission file in a storage directory
        $assignment->submissions()->create([
            'user_id' => auth()->id(),
            'filename' => $filename,
        ]);

        return redirect()->back()->with('success', 'Assignment submitted successfully.');
    }

    return redirect()->back()->with('error', 'Submission failed. Please try again.');
}
}
