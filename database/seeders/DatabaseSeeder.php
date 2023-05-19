<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Assignment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Course::create(['name' => 'Learn PHP','category' => 'Computer science', 'lecturer'=> 'Jānis Būda', 'duration'=> '4 months']);
        Course::create(['name' => 'English lessons', 'category' => 'Languages', 'lecturer'=> 'Ann Miningway', 'duration'=> '9 months' ]);
        Course::create(['name' => 'Everything about Crypto', 'category' => 'Economics', 'lecturer'=> 'Krish Manutra', 'duration'=> '4 weeks']);
        Course::create(['name' => 'History 101', 'category' => 'History', 'lecturer'=> 'Albert Green', 'duration'=> '3 weeks']);
     
        #approach #1 - create instance of manufacturer, call save on collection
        // $english = Course::where('name', 'English lessons')->first();
        // $introquiz = new Assignment();
        // $introquiz->name = 'Introductory quiz';
        // $introquiz->course_id = 2;
        // $introquiz->duedate = 'Introductory quiz';
        // $english->assignments()->save($introquiz);

        // $history101 = Course::where('name', 'History 101')->first();
        // $knowledgetest = new Assignment();
        // $knowledgetest->name = 'Knowledge test ';
        // $history101->assignments()->save($knowledgetest);
        
    }
}
