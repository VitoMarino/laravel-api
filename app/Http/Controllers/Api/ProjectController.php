<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index(){
        // Dopo with vanno inseriti i metodi presenti nei modelli connessi al modello principale
        $projects = Project::with('type', 'technologies')->paginate(10); // Lazy loading di 10 projects
        // Con success e l'array è un metodo più corretto di esporre il dato tramite API
        return response()->json([
            'success' => true,
            'result' => $projects
        ]);
    }

    /* public function index(){
        $projects = Project::all(); // Eager loading di tutti i projects
        return response()->json($projects);
    }/*

    /*public function index(){
        return response()->json([
            'name' => 'Vito'
        ]);
    }*/

    // Metodo per chiamare la show
    /*public function show(string $id){
            // Dopo with vanno inseriti i metodi presenti nei modelli connessi al modello principale
            $project = Project::with('type', 'technologies')->findOrFail($id);
            // Con success e l'array è un metodo più corretto di esporre il dato tramite API
            return response()->json([
                'success' => true,
                'result' => $project
            ]);
        }
    }*/

    // Se stiamo usando la dependecies il discorso è diverso
    /*public function show(Project $project){

        // Se ho il modello già popolato posso dirgli loadMissing, cioè caricami quello che manca
        $project->loadMissing('type', 'technologies');

        // Con success e l'array è un metodo più corretto di esporre il dato tramite API
        return response()->json([
            'success' => true,
            'result' => $project
        ]);
    }*/

    //? Se voglio che NON mi compaiano determinate cose nel JSON faccio quanto segue e mi compariranno solo quelle
    //? che specifico nell'array
    public function show(Project $project){

        // Se ho il modello già popolato posso dirgli loadMissing, cioè caricami quello che manca
        $project->loadMissing('type', 'technologies');

        // Con success e l'array è un metodo più corretto di esporre il dato tramite API
        return response()->json([
            'success' => true,
            'result' => $project
        ]);
    }

    // Request corrisponde a quello che cerco nella barra di ricerca per fare una chiamata get
    //? Questa funzione mi permette di cercare in questo caso, i nomi all'interno dei dati che corrispondono alla mia richiesta
    public function projectSearch(Request $request){
        // dd($request->all());
        $data = $request->all();

        $projects = Project::where('name', 'LIKE', '%' . $data['name'] . '%')->get();

        return response()->json([
            'success'=> true,
            'results'=> $projects
        ]);
    }
}
