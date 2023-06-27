<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity; // replace this line with the correct import
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function showActivities()
    {
        $activities = Activity::all();

        return view('activities', compact('activities'));
    }
}
