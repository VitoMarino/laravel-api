<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //
        $projects = Project::all();
        $technologies = Technology::all()->pluck('id');

        // Attach è un metodo che mi permette di fare un'operazione attraverso il quale andiamo a dire "tu modello sei connesso ad x cose".
        // In sostanza prendo la RELAZIONE tra i due MODELLI e con attach le chiedo di creare un collegamento tra essi.
        // Se voglio eliminare TUTTE le RELAZIONI uso detach('con parentesi vuote'). Altrimenti all'interno della parentesi metto l'elemento per cui voglio eliminare la relazione.
        // Un terzo metodo è SYNC che mi permette di eliminare le relazioni che non voglio e mi lascia o aggiunge quello che voglio nell'array.
        foreach ($projects as $project) {
            $project->technologies()->attach($faker->randomElements($technologies, rand(2,4)));
        }
    }
}
