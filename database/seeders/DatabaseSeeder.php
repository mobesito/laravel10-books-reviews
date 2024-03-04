<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Book;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //esta linea crea 33 libros y para cada libro se hace lo siguiente
        Book::factory(33)->create()->each(function($book){
            //se decide el numero de reviews que tendra de forma aleatoria
            $numReviews = random_int(5, 30);
            //se crean las reviews 
            Review::factory()->count($numReviews)
            ->good()
            ->for($book)
            ->create();
        });

        Book::factory(33)->create()->each(function($book){
            $numReviews = random_int(5, 30);
            Review::factory()->count($numReviews)
            ->average()
            ->for($book)
            ->create();
        });

        Book::factory(34)->create()->each(function($book){
            $numReviews = random_int(5, 30);
            Review::factory()->count($numReviews)
            ->bad()
            ->for($book)
            ->create();
        });
    }
}
