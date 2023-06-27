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
        return view('lecturercreate');
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
            
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|min:3|max:40',
        'education' => 'required|min:5|max:80',
        'description' => 'required|min:5|max:200',
    ]);

    $lecturer = new Lecturer;
    $lecturer->name = $request->name;
    $lecturer->education = $request->education;
    $lecturer->description = $request->description;
    $lecturer->save();

    return redirect()->route('lecturers.index');
}

}




