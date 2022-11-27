<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\SecteurActivite;
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
        // ]);Développement des Affaires
        $role1 = SecteurActivite::create(['nom' => 'Marketing']);
        $role1 = SecteurActivite::create(['nom' => 'Service Client']);
        $role1 = SecteurActivite::create(['nom' => 'Ressources Humaines']);
        $role1 = SecteurActivite::create(['nom' => 'Gestion de Projet']);
        $role1 = SecteurActivite::create(['nom' => 'Développement des Affaires']);
        $role1 = SecteurActivite::create(['nom' => 'Ventes & Communication']);
        $role1 = SecteurActivite::create(['nom' => 'Enseignement et éducation']);
        $role1 = SecteurActivite::create(['nom' => 'Design & Création']);
    }
}
