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

        $challenge = Challenge::create([
            'name' => 'besturing',
            'slug' => 'besturing',
            'description' => 'voer dit en dit uit',
            'goal' => 'Dit is het doel',
            'active' => true
        ]);

        $challenge->tips()->create(['content' => 'Dit is om te laten zien hoe een tip **eruit ziet**. Dit kunt u hier vinden: [Test](https://www.youtube.com/)']);
    }
}
