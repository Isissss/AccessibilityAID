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

        $challenge = Challenge::create([
            'slug' => 'contrast',
            'name' => 'Contrast',
            'description' => 'Deze opdracht simuleert hoe iemand die kleurenblind is een webshop met te weinig contrast beleeft. Als u de opdracht start krijgt u een pagina te zien waarop u zo snel mogelijk een specifiek element moet vinden.',
            'goal' => 'Navigeer naar het element: " Breedte filter"',
        ]);

        Challenge::create([
            'slug' => 'besturing',
            'name' => 'Besturing',
            'description' => 'Deze opdracht simuleert hoe iemand die geen muis kan gebruiken een webshop beleeft. Als u de opdracht start krijgt u een pagina te zien waarop u door middel van de TAB knop op uw toetsenbord de pagina moet navigeren een een specifiek element moet selecteren',
            'goal' => 'Navigeer naar het element: "Categorie 5"',
        ]);


        $challenge->tips()->create(['content' => 'Dit is om te laten zien hoe een tip **eruit ziet**. Dit kunt u hier vinden: [Test](https://www.youtube.com/)']);
        $challenge->tips()->create(['content' => 'Op **[deze website](https://www.youtube.com/)** check je hoe het zit met de contrast op uw website . Deze kleurentest vind je [hier](https://www.youtube.com/)']);

    }
}
