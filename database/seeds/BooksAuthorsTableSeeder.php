<?php

use Illuminate\Database\Seeder;

class BooksAuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books_authors')->insert([
            ['name' => 'Гуменюк Надежда'],
            ['name' => 'Волков Алексей Михайлович'],
            ['name' => 'Винничук'],
        ]);
    }
}
