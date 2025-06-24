<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Clean Code',
            'author' => 'Robert C. Martin',
            'price' => 45.99,
            'image' => 'clean_code.png',
        ]);

        Book::create([
            'title' => 'The Pragmatic Programmer',
            'author' => 'Andrew Hunt',
            'price' => 39.99,
            'image' => 'pragmatic_programmer.png',
        ]);

        Book::create([
            'title' => 'Laravel Up & Running',
            'author' => 'Matt Stauffer',
            'price' => 50.00,
            'image' => 'laravel_up_and_running.png',
        ]);
         Book::create([
            'title' => 'Laravel Up & Running',
            'author' => 'Matt Stauffer',
            'price' => 50.00,
            'image' => 'laravel_up_and_running.png',
        ]);
         Book::create([
            'title' => 'Laravel Up & Running',
            'author' => 'Matt Stauffer',
            'price' => 50.00,
            'image' => 'laravel_up_and_running.png',
        ]);
    }
}
