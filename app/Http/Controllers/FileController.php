<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request, Course $course)
{
    if($request->hasFile('file')){
        $file = $request->file('file');
        $name = $file->getClientOriginalName(); // Removed time()
        $filePath = $request->file('file')->storeAs('uploads', $name, 'public');

        // Save file information in database
        $fileRecord = new File;
        $fileRecord->name = $name;
        $fileRecord->path = $filePath;
        $fileRecord->course_id = $course->id;  // Assuming you have a `course_id` column in your `files` table
        $fileRecord->save();
    
        return back();
    }
    return back();
}

    

    public function download($id)
    {
        $file = File::findOrFail($id);
        return Storage::disk('public')->download($file->path);
    }

    public function delete($id)
{
    $file = File::findOrFail($id);

    // Delete the file from the storage
    Storage::disk('public')->delete($file->path);

    // Delete the file record from the database
    $file->delete();

    return back();
}

}
