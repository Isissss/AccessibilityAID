<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Challenge;
use App\Models\User;
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

        //password = Gebruiker123
        User::create([
            'name' => 'Gebruiker',
            'email' => 'gebruiker@gebruiker.com',
            'password' => '$2y$10$GfSAw2yFvw//2033XKedWOCIWmAWriVZAHYDsL.WsrMZrMKnb0QmW',
        ]);

        $challenge = Challenge::create([
            'slug' => 'contrast',
            'name' => 'Contrast',
            'description' => 'Opdracht met contrast problemen',
            'goal' => 'Zoek de breedte filter op de website en klik er op',
        ]);

        Challenge::create([
            'slug' => 'besturing',
            'name' => 'besturing',
            'description' => 'Opdracht met met tab navigatie',
            'goal' => 'Navigeer naar element ... op de pagina',
        ]);


        $challenge->tips()->create(['content' => 'Dit is om te laten zien hoe een tip **eruit ziet**. Dit kunt u hier vinden: [Test](https://www.youtube.com/)']);
        $challenge->tips()->create(['content' => 'Op ** deze website ** check je hoe het zit met de contrast op uw website . Deze kleurentest vind je [hier](https://www.youtube.com/)']);


        Challenge::create([
            'slug' => 'test',
            'name' => 'Test',
            'description' => 'Test opdracht',
            'goal' => 'Doe iets',
        ]);

    }
}
