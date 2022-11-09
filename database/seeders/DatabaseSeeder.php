<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Challenge;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        Challenge::create([
            'slug' => 'contrast',
            'name' => 'Contrast',
            'description' => 'Opdracht met contrast problemen',
            'goal' => 'Zoek element ... op de pagina',
        ]);

        $challenge = Challenge::create([
            'slug' => 'besturing',
            'name' => 'besturing',
            'description' => 'Opdracht met met tab navigatie',
            'goal' => 'Navigeer naar element ... op de pagina',
        ]);


        $challenge->tips()->create(['content' => 'Dit is om te laten zien hoe een tip **eruit ziet**. Dit kunt u hier vinden: [Test](https://www.youtube.com/)']);


        Challenge::create([
            'slug' => 'test',
            'name' => 'Test',
            'description' => 'Test opdracht',
            'goal' => 'Doe iets',
        ]);

    }
}
