<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Listing::factory(6)->create();

        // Listing::create([
        //     'title' => 'laravel Senior Developer',
        //     'tags' => 'laravel ,js',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'email@email.com',
        //     'website' => 'https://www/acme.com',
        //     'description' => 'lorem ncosincon pejfow 
        //     pejfnonf onfe fiej pojepdoijwpd onfeoifeo
        //     jeof0he0o iefubeof0w lwje02jrfn',
        // ]);
        // Listing::create([
        //     'title' => 'FullStack Developer',
        //     'tags' => 'laravel ,api',
        //     'company' => 'Acme lolo',
        //     'location' => 'NYC, MA',
        //     'email' => 'email2@email.com',
        //     'website' => 'https://www/lole.com',
        //     'description' => 'lorem ncosincon pejfow 
        //     pejfnonf onfe fiej pojepdoijwpd onfeoifeo
        //     jeof0he0o iefubeof0w lwje02jrfn',
        // ]);
    }
}
