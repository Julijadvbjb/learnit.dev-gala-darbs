<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Assignment;
use App\Models\Category;
use App\Models\Feedback;
use App\Models\Lecturer;


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
        Category::create(['name'=> 'Science']);
        Category::create(['name'=> 'Math']);
        Category::create(['name'=> 'Health']);
        Category::create(['name'=> 'Politics']);
        Category::create(['name'=> 'Literature']);
        Category::create(['name'=> 'Sports']);
        #lecturers
        Lecturer::create(['name' => 'Annija Būda', 'education'=> 'Bakalaura grāds Datorzinātnēs',  'description'=>'Smaidīga, jauka pasniedzēja ar cieņu pret studentiem. Māca programmēšanu jau 10 gadus. ' ]);
        Lecturer::create(['name' => 'Emil Donec', 'education'=> 'Bakalaura grāds Humanitārajās zinātnēs',  'description'=>'Prot 6 valodas, tostarp angļu. Apmāca studentus ar video materiāliem un spēlēm. ' ]);
        Lecturer::create(['name' => 'Moris Bill Downing', 'education'=> 'Maģistra grāds Ekonomikā',  'description'=>'Apvieno darbu lielā komānijā ar lekciju lasīšanu studentiem. Pieredze savā jomā-20 gadi.  ' ]);
        Lecturer::create(['name' => 'Julija Ābele','education'=> 'Bakalaura grāds Vēstures zinātnē',  'description'=>'Uzrakstīja vairākas grāmatas par Latvijas vēsturi. ZInoša un saprotoša, katram studentam atrod individuālu pieeju.' ]);
        Lecturer::create(['name' => 'Mārtiņš Līdums', 'education'=> 'Doktora grāds Fizikā', 'description'=> 'Mārtiņš ir izcilības balvas laureāts fizikā. Viņa aizraušanās ir kvantu mehānika un astrofizika.' ]);
        Lecturer::create(['name' => 'Inese Kalniņa', 'education'=> 'Maģistra grāds Bioloģijā', 'description'=> 'Inese ir zinātniskās pētnieces darba balvu laureāte. Viņa ir eksperte mikrobioloģijā un molekulārajā bioloģijā.' ]);
        Lecturer::create(['name' => 'Ivars Putnis', 'education'=> 'Bakalaura grāds Datorzinātnēs', 'description'=> 'Ivars ir talantīgs datorzinātnes lektors ar plašu programmēšanas valodu zināšanu spektru.' ]);
        Lecturer::create(['name' => 'Ieva Ķibere', 'education'=> 'Bakalaura grāds Socioloģijā', 'description'=> 'Ieva ir socioloģe, kura specializējusies sabiedrisko attiecību un sociālo zinātņu jomā.' ]);
        Lecturer::create(['name' => 'Andrejs Čaka', 'education'=> 'Doktora grāds Literatūrā', 'description'=> 'Andrejs ir literatūras profesors, kura specialitāte ir 19. un 20. gadsimta latviešu literatūra.' ]);

        #courses.............
        Course::create(['name' => 'Everything about Crypto', 'category_id' => 3, 'lecturer_id'=> 3,  'description'=> 'The course covers essential topics such as the fundamentals of cryptocurrency, including Bitcoin and altcoins, as well as the underlying blockchain technology. ']);
        Course::create(['name' => 'History 101', 'category_id' => 4, 'lecturer_id'=> 4,  'description'=> 'History 101 is a fascinating course that delves into the study of human civilization and its significant events throughout the ages. ']);
        Course::create([
            'name' => 'Introduction to Quantum Physics', 
            'category_id' => 6, 
            'lecturer_id'=> 5,  
            'description'=> 'A comprehensive overview of quantum physics, including topics such as wave-particle duality, quantum states, and Heisenberg’s uncertainty principle.'
        ]);
        Course::create([
            'name' => 'Nutrition basics', 
            'category_id' => 8, 
            'lecturer_id'=> 6,  
            'description'=> 'Learn how to eat healthy and everything about nutrition.'
        ]);
        
        Course::create([
            'name' => 'Microbiology: The Invisible World', 
            'category_id' => 5, 
            'lecturer_id'=> 6,  
            'description'=> 'A deep dive into the world of microbes, exploring their diversity, the role they play in ecosystems, and their significance in health and disease.'
        ]);
        
        Course::create([
            'name' => 'Advanced Programming Techniques', 
            'category_id' => 1, 
            'lecturer_id'=> 7,  
            'description'=> 'This course focuses on advanced programming techniques, including algorithms, data structures, and software engineering principles.'
        ]);
        
        Course::create([
            'name' => 'Sociology: Understanding Social Dynamics', 
            'category_id' => 9, 
            'lecturer_id'=> 8,  
            'description'=> 'An examination of societal structures and dynamics, covering topics such as socialization, social stratification, and the role of institutions in shaping society.'
        ]);
        
        Course::create([
            'name' => 'Latvian Literature of the 19th and 20th Centuries', 
            'category_id' => 10, 
            'lecturer_id'=> 9,  
            'description'=> 'A study of the major works and authors of Latvian literature in the 19th and 20th centuries, with a focus on literary styles, themes, and historical context.'
        ]);
        
        $course1 = Course::create(['name' => 'Learn PHP', 'category_id' => 1, 'lecturer_id'=> 1, 'description'=>'The Learn PHP course provides a comprehensive understanding of PHP for web development.']);    
        $course2 = Course::create(['name' => 'English lessons', 'category_id' => 2, 'lecturer_id'=> 2, 'description'=>'English Lessons Course is a comprehensive program designed to help individuals enhance their English language skills. ' ]);


       #assignments...........
        $english = Course::where('name', 'English lessons')->first();
        $introquiz = new Assignment();
        $introquiz->course_id = 2;
        $introquiz->feedback_id = 1;
        $introquiz->title = 'introquiz';
        $introquiz->task = 'Fill out the given Introductory quiz(pdf)';
        $english->assignments()->save($introquiz);

        $history101 = Course::where('name', 'History 101')->first();
        $knowledgetest = new Assignment();
        $knowledgetest->course_id = 4;
        $knowledgetest->feedback_id = null;
        $knowledgetest->title = 'knowledgetest';
        $knowledgetest->task = 'Take a quick Knowledge test given in the pdf file';
       
        $history101->assignments()->save($knowledgetest);

        $courseCrypto = Course::where('name', 'Everything about Crypto')->first();
$cryptoAssignment = new Assignment();
$cryptoAssignment->course_id = $courseCrypto->id;
$cryptoAssignment->feedback_id = null;
$cryptoAssignment->title = 'CryptoQuiz';
$cryptoAssignment->task = 'Follow steps in pdf and Create account in crypto website.';

$courseCrypto->assignments()->save($cryptoAssignment);

$courseQuantumPhysics = Course::where('name', 'Introduction to Quantum Physics')->first();
$quantumAssignment = new Assignment();
$quantumAssignment->course_id = $courseQuantumPhysics->id;
$quantumAssignment->feedback_id = null;
$quantumAssignment->title = 'QuantumQuiz';
$quantumAssignment->task = 'Take the Quantum Physics Quiz in the given pdf';

$courseQuantumPhysics->assignments()->save($quantumAssignment);

$courseMicrobiology = Course::where('name', 'Microbiology: The Invisible World')->first();
$microAssignment = new Assignment();
$microAssignment->course_id = $courseMicrobiology->id;
$microAssignment->feedback_id = null;
$microAssignment->title = 'MicrobiologyQuiz';
$microAssignment->task = 'Take the Microbiology Quiz in the given pds file';

$courseMicrobiology->assignments()->save($microAssignment);

$courseProgramming = Course::where('name', 'Advanced Programming Techniques')->first();
$progAssignment = new Assignment();
$progAssignment->course_id = $courseProgramming->id;
$progAssignment->feedback_id = null;
$progAssignment->title = 'ProgrammingQuiz';
$progAssignment->task = 'Take the Programming Quiz at programming.eu';

$courseProgramming->assignments()->save($progAssignment);

$courseSociology = Course::where('name', 'Sociology: Understanding Social Dynamics')->first();
$socAssignment = new Assignment();
$socAssignment->course_id = $courseSociology->id;
$socAssignment->feedback_id = null;
$socAssignment->title = 'Sociology';
$socAssignment->task = 'Make a sociology epiriment on your family or friends';

$courseSociology->assignments()->save($socAssignment);

$courseLiterature = Course::where('name', 'Latvian Literature of the 19th and 20th Centuries')->first();
$litAssignment = new Assignment();
$litAssignment->course_id = $courseLiterature->id;
$litAssignment->feedback_id = null;
$litAssignment->title = 'Literature assignment';
$litAssignment->task = 'Read War and Peace, write your thougts.';

$courseLiterature->assignments()->save($litAssignment);

$coursePHP = Course::where('name', 'Learn PHP')->first();
$phpAssignment = new Assignment();
$phpAssignment->course_id = $coursePHP->id;
$phpAssignment->feedback_id = null;
$phpAssignment->title = 'PHP task';
$phpAssignment->task = 'Read PHP documentation and write a simple program';

$coursePHP->assignments()->save($phpAssignment);

    }
}
