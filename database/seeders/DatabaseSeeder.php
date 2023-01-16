<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Challenge;
use App\Models\Tip;
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
        Tip::create([
            'challenge_id' => '1',
            'content' => 'Wat je op moet letten. Niet alleen donker kleuren gebruiken en vergelijkbare kleuren. Dit maakt het moeilijk voor mensen die kleurenblind zijn om woorden te zien. De beste manier om dit te vermijden is kleuren met veel contrast te gebruiken.',
            'wordpress'=>'0'
        ]);
        Tip::create([
            'content' => 'Op **deze website** check je hoe het zit met de contrast op uw website . Deze kleurentest vind je [hier](https://webaim.org/resources/contrastchecker/)',
            'challenge_id' => '1'
        ]);
        Tip::create([
            'content' => 'Op **deze website** krijg je 8 goed tips die je website kleurenblind vriendelijk maakt. Deze site vind je [hier](https://www.audioeye.com/post/8-ways-to-design-a-color-blind-friendly-website/)',
            'challenge_id' => '1'
        ]);
        Tip::create([
            'challenge_id' => '1',
            'content' => 'Op **deze website** kan je een extensie downloaden voor wordpress die checkt of je site accessible is. Deze extensie vind je [hier](https://wordpress.org/plugins/accessibility-checker/)',
            'wordpress'=>'1'
        ]);
        Tip::create([
            'challenge_id' => '1',
            'content' => 'Op **deze website** kan je een extensie downloaden die je website gewoon in een keer accessible maakt. Dit extensie fixed contrast, font en veel meer. Deze extensie vind je [hier](https://wordpress.org/plugins/pojo-accessibility/)',
            'wordpress'=>'1'
        ]);
        Tip::create([
            'challenge_id' => '2',
            'content' => 'Wat je op moet letten. Meeste mensen met een beperking gebruiken **TAB** om door de website te gaan dus het is handig om een visual te geven van waar je bent zodat ze weten wanneer ze ENTER moeten klikken',
            'wordpress'=>'0'
        ]);
        Tip::create([
            'challenge_id' => '2',
            'content' => 'Op **deze website** krijg je tips over navigatie en het verbeteren van invoervelden. Deze website vind je [hier](https://www.nngroup.com/articles/keyboard-accessibility/)',
            'wordpress'=>'0'
        ]);
        Tip::create([
            'challenge_id' => '2',
            'content' => 'Op **deze website** krijg je tips over CSS en HTML om je website te verbeteren. Deze website vind je [hier](https://webdesign.tutsplus.com/articles/keyboard-accessibility-tips-using-html-and-css--cms-31966)',
            'wordpress'=>'0'
        ]);
        Tip::create([
            'challenge_id' => '2',
            'content' => 'Op **deze website** krijg je tips over navigatie en het verbeteren van invoervelden. Deze website vind je [hier](https://www.nngroup.com/articles/keyboard-accessibility/)',
            'wordpress'=>'0'
        ]);
        Tip::create([
            'challenge_id' => '2',
            'content' => 'Op **deze website** krijg je de beste extensies om keyboard toegankelijkheid in uw website te integreren . Deze extensies vind je [hier](https://wordpress.org/plugins/tags/keyboard-navigation/)',
            'wordpress'=>'1'
        ]);
        Tip::create([
            'challenge_id' => '2',
            'content' => 'Op **deze website** krijg je de beste extensies om keyboard toegankelijkheid in uw website te integreren . Deze extensies vind je [hier](https://wordpress.org/plugins/tags/keyboard-navigation/)',
            'wordpress'=>'1'
        ]);


    }
}
