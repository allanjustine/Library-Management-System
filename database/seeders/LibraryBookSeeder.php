<?php

namespace Database\Seeders;

use App\Models\LibraryBook;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibraryBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $libraryBooks = [
            [
                'name_of_book' => 'Introduction to Psychology',
                'category_of_book' => 'Psychology',
                'book_assign' => 'Psychology Topic'
            ],
            [
                'name_of_book' => 'Business Studies: Concepts and Cases',
                'category_of_book' => 'Business Studies',
                'book_assign' => 'Business Studies Topic'
            ],
            [
                'name_of_book' => 'Environmental Science: A Global Perspective',
                'category_of_book' => 'Environmental Science',
                'book_assign' => 'Environmental Science Topic'
            ],
            [
                'name_of_book' => 'Physical Education: Health and Wellness',
                'category_of_book' => 'Physical Education',
                'book_assign' => 'Physical Education Topic'
            ],
            [
                'name_of_book' => 'Art History: From Prehistoric to Modern Times',
                'category_of_book' => 'Art History',
                'book_assign' => 'Art History Topic'
            ],
            [
                'name_of_book' => 'Economics: Principles and Applications',
                'category_of_book' => 'Economics',
                'book_assign' => 'Economics Topic'
            ],
            [
                'name_of_book' => 'Foreign Language: Beginner`s Guide',
                'category_of_book' => 'Language Learning',
                'book_assign' => 'Language Learning Topic'
            ],
            [
                'name_of_book' => 'Mathematics for High School',
                'category_of_book' => 'Mathematics',
                'book_assign' => 'Mathematics Topic'
            ],
            [
                'name_of_book' => 'Physics: Principles and Problems',
                'category_of_book' => 'Physics',
                'book_assign' => 'Physics Topic'
            ],
            [
                'name_of_book' => 'Biology: A Comprehensive Guide',
                'category_of_book' => 'Biology',
                'book_assign' => 'Biology Topic'
            ],
            [
                'name_of_book' => 'Chemistry: Concepts and Applications',
                'category_of_book' => 'Chemistry',
                'book_assign' => 'Chemistry Topic'
            ],
            [
                'name_of_book' => 'English Literature: A Student`s Companion',
                'category_of_book' => 'English',
                'book_assign' => 'English Topic'
            ],
            [
                'name_of_book' => 'History of World Civilizations',
                'category_of_book' => 'History',
                'book_assign' => 'History Topic'
            ],
            [
                'name_of_book' => 'Introduction to Computer Science',
                'category_of_book' => 'Computer Science',
                'book_assign' => 'Computer Science Topic'
            ],
            [
                'name_of_book' => 'Geography: Exploring the World',
                'category_of_book' => 'Geography',
                'book_assign' => 'Geography Topic'
            ],
        ];

        foreach ($libraryBooks as $libraryBook) {
            LibraryBook::create($libraryBook);
        }
    }
}
