<?php

use Illuminate\Database\Seeder;

class BooksGenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books_genres')->insert([
            ['name' => 'Юмор'],
            ['name' => 'Детективы и Триллеры'],
            ['name' => 'Детские'],
            ['name' => 'Справочная литература'],
            ['name' => 'Документальная литература'],
            ['name' => 'Домоведение (Дом и семья)'],
            ['name' => 'Компьютеры и Интернет'],
            ['name' => 'Любовные романы'],
            ['name' => 'Наука, Образование'],
            ['name' => 'Поэзия, Драматургия'],
            ['name' => 'Приключения'],
            ['name' => 'Проза'],
            ['name' => 'Религия и духовенство'],
            ['name' => 'Старинная литература'],
            ['name' => 'Фантастика'],
        ]);
    }
}
