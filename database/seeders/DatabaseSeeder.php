<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Assignment;
use App\Models\Category;
use App\Models\Feedback;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {  #category...........
        Category::create(['name'=> 'Computer science']);
        Category::create(['name'=> ' Languages']);
        Category::create(['name'=> 'Economics']);
        Category::create(['name'=> 'History']);
        Category::create(['name'=> 'Nature']);

        #courses.............
        Course::create(['name' => 'Learn PHP','category_id' => 1, 'lecturer'=> 'Jānis Būda', 'duration'=> '4 months', 'description'=>'The Learn PHP course provides a comprehensive understanding of PHP for web development.']);
        Course::create(['name' => 'English lessons', 'category_id' => 2, 'lecturer'=> 'Ann Miningway', 'duration'=> '9 months', 'description'=>'English Lessons Course is a comprehensive program designed to help individuals enhance their English language skills. ' ]);
        Course::create(['name' => 'Everything about Crypto', 'category_id' => 3, 'lecturer'=> 'Krish Manutra', 'duration'=> '4 weeks', 'description'=> 'The course covers essential topics such as the fundamentals of cryptocurrency, including Bitcoin and altcoins, as well as the underlying blockchain technology. ']);
        Course::create(['name' => 'History 101', 'category_id' => 4, 'lecturer'=> 'Albert Green', 'duration'=> '3 weeks', 'description'=> 'History 101 is a fascinating course that delves into the study of human civilization and its significant events throughout the ages. ']);

        #feedback...........
        Feedback::create([ 'grade'=> 8, 'comment'=>'Dažas kļūdas']);

       #assignments...........
        $english = Course::where('name', 'English lessons')->first();
        $introquiz = new Assignment();
        $introquiz->course_id = 2;
        $introquiz->feedback_id = 1;
        $introquiz->task = 'Fill out the given Introductory quiz';
        $introquiz->duedate = '01.06.2023';
        $english->assignments()->save($introquiz);

        $history101 = Course::where('name', 'History 101')->first();
        $knowledgetest = new Assignment();
        $knowledgetest->course_id = 4;
        $knowledgetest->feedback_id = null;
        $knowledgetest->task = 'Take a quick Knowledge test ';
        $knowledgetest->duedate = '11.06.2023';
        $history101->assignments()->save($knowledgetest);
        
    }
}
