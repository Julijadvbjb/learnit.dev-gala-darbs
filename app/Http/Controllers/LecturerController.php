<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer;



class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = Lecturer::all();
    
        return view('lecturers', compact('lecturers'));
    }
    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();
    
        return redirect()->route('lecturers.index');
               
    }
    public function create()
    {
        return view('lecturers.create');
    }
    public function show($id)
    {
        // Retrieve the lecturer by their ID
        $lecturer = Lecturer::find($id);
    
        // If lecturer does not exist, return an error response
        if ($lecturer === null) {
            return redirect()->back()->withErrors(['error' => 'Lecturer not found']);
        }
    
        // If lecturer does exist, pass it to the view
        return view('lecturers.show', compact('lecturer'));
    }
            
    
}




