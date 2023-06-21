<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Course;
use App\Http\Controllers\ModelNotFoundException;
use App\Http\Controllers\Session;
use App\Models\User;


class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $course = Course::find($id);
        $assignments = $course->assignments;
        return view('assignments', compact('assignments', 'course'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show the form for creating a new assignment
        return view('assignments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'task' => 'required',
        'duedate' => 'required',
    ]);

    // Create a new assignment using the validated data
    $assignment = Assignment::create($validatedData);

    // Redirect to the assignment's show page and pass the assignment ID
    return redirect()->route('assignments.show', ['id' => $assignment->id]);
}

    /**
     * Display the specified resource.
     */
   /**
 * Display the specified resource.
 */
/**
 * Display the specified resource.
 */
public function show(string $id)
{
    $assignment = Assignment::findOrFail($id);
    $course = $assignment->course; // Assuming there is a relationship between Assignment and Course models

    return view('assignments.show', compact('assignment', 'course'));
}



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the assignment by its ID
        $assignment = Assignment::findOrFail($id);

        // Show the form for editing the assignment
        return view('assignments.edit', compact('assignment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the assignment by its ID
        $assignment = Assignment::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'task' => 'required',
            'duedate' => 'required',
        ]);

        // Update the assignment using the validated data
        $assignment->update($validatedData);

        // Redirect to the assignment's show page
        return redirect()->route('assignments.show', $assignment->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the assignment by its ID
        $assignment = Assignment::findOrFail($id);

        // Delete the assignment
        $assignment->delete();

        // Redirect to the assignments index page
        return redirect()->route('assignments.index');
    }
}
