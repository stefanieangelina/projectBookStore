<?php

use App\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $genres = [
            'Fantasy',
            'Sci-Fi',
            'Horror'
        ];
        foreach ($genres as $key => $value) {
            $newGenre = new Genre();
            $newGenre->name = $value;
            $newGenre->save();
        }
    }
}
