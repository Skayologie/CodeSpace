<?php

namespace Database\Seeders;

use App\Models\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $themes = [
            ['name' => 'Actualités et politique', 'parent' => null],
            ['name' => 'Affaires et finances', 'parent' => null],
            ['name' => 'Anime et cosplay', 'parent' => null],
            ['name' => 'Art', 'parent' => null],
            ['name' => 'Gaming', 'parent' => null],
            ['name' => 'Science & Technologie', 'parent' => null],
            ['name' => 'Sports', 'parent' => null],
            ['name' => 'Lifestyle', 'parent' => null],
        ];
        Theme::insert($themes);

        $themeIds = DB::table('themes')->pluck('id', 'name');
        $subthemes = [
            // Actualités et politique
            ['name' => 'Actualités', 'parent' => $themeIds['Actualités et politique']],
            ['name' => 'Activisme', 'parent' => $themeIds['Actualités et politique']],
            ['name' => 'Politique', 'parent' => $themeIds['Actualités et politique']],

            // Affaires et finances
            ['name' => 'Finances personnelles', 'parent' => $themeIds['Affaires et finances']],
            ['name' => 'Crypto', 'parent' => $themeIds['Affaires et finances']],
            ['name' => 'Économie', 'parent' => $themeIds['Affaires et finances']],
            ['name' => 'Offres et marché', 'parent' => $themeIds['Affaires et finances']],
            ['name' => 'Startups et entrepreneuriat', 'parent' => $themeIds['Affaires et finances']],
            ['name' => 'Immobilier', 'parent' => $themeIds['Affaires et finances']],
            ['name' => 'Actions et investissement', 'parent' => $themeIds['Affaires et finances']],

            // Anime et cosplay
            ['name' => 'Anime et Mangas', 'parent' => $themeIds['Anime et cosplay']],
            ['name' => 'Cosplay', 'parent' => $themeIds['Anime et cosplay']],

            // Art
            ['name' => 'Arts du spectacle', 'parent' => $themeIds['Art']],
            ['name' => 'Architecture', 'parent' => $themeIds['Art']],
            ['name' => 'Design', 'parent' => $themeIds['Art']],
            ['name' => 'Art numérique', 'parent' => $themeIds['Art']],
            ['name' => 'Photographie', 'parent' => $themeIds['Art']],

            // Gaming
            ['name' => 'Jeux PC', 'parent' => $themeIds['Gaming']],
            ['name' => 'Jeux Console', 'parent' => $themeIds['Gaming']],
            ['name' => 'eSports', 'parent' => $themeIds['Gaming']],

            // Science & Technologie
            ['name' => 'Intelligence Artificielle', 'parent' => $themeIds['Science & Technologie']],
            ['name' => 'Programmation', 'parent' => $themeIds['Science & Technologie']],
            ['name' => 'Espace', 'parent' => $themeIds['Science & Technologie']],
            ['name' => 'Informatique', 'parent' => $themeIds['Science & Technologie']],

            // Sports
            ['name' => 'Football', 'parent' => $themeIds['Sports']],
            ['name' => 'Basketball', 'parent' => $themeIds['Sports']],
            ['name' => 'Formule 1', 'parent' => $themeIds['Sports']],
            ['name' => 'Tennis', 'parent' => $themeIds['Sports']],

            // Lifestyle
            ['name' => 'Voyage', 'parent' => $themeIds['Lifestyle']],
            ['name' => 'Mode', 'parent' => $themeIds['Lifestyle']],
            ['name' => 'Cuisine', 'parent' => $themeIds['Lifestyle']],
        ];

        Theme::insert($subthemes);


    }
}
