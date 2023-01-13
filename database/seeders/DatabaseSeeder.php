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

        //password = Gebruiker123
        User::create([
            'name' => 'Admin',
            'admin' => true,
            'email' => 'admin@gebruiker.com',
            'password' => '$2y$10$GfSAw2yFvw//2033XKedWOCIWmAWriVZAHYDsL.WsrMZrMKnb0QmW',
        ]);
        $challenge = Challenge::create([
            'slug' => 'contrast',
            'name' => 'Contrast',
            'description' => 'Deze opdracht simuleert hoe iemand die kleurenblind is een webshop met te weinig contrast beleeft. Als u de opdracht start krijgt u een pagina te zien waarop u zo snel mogelijk een specifiek element moet vinden.',
            'goal' => 'Zoek de breedte filter op de webshop en klik er op',
        ]);

        Challenge::create([
            'slug' => 'besturing',
            'name' => 'Besturing',
            'description' => 'Deze opdracht simuleert hoe iemand die geen muis kan gebruiken een webshop beleeft. Als u de opdracht start krijgt u een pagina te zien waarop u door middel van de TAB knop op uw toetsenbord de pagina moet navigeren een een specifiek element moet selecteren',
            'goal' => 'Navigeer naar het element: Categorie 5',
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
