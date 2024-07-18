<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRessourceRequest;
use App\Http\Requests\UpdateRessourceRequest;
use App\Models\Ressource;
use App\Models\Catalogue;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage;

class RessourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        //
        if ($req->catalogue_id  != '') 
                //On cree la requete avec une eventuelle selection sur le sujet
                $ressources = Ressource::whereAny(['titre', 'corps'] , 'like', '%' . $req->search . '%')
                                            ->where('catalogue_id', $req->catalogue_id )
                                            ->orderBy('created_at', 'desc')
                                            ->paginate(9);
        else  $ressources = Ressource::whereAny(['titre', 'corps'] , 'like', '%' . $req->search . '%')
                                            ->orderBy('created_at', 'desc')
                                            ->paginate(9);
        return view('pages.ressource.list',  compact('ressources'));       
        
    }

    /**
     * Display the specified resource. given the id 
     */
    public function show(Request $req )
    {

        $myres = Ressource::findOrFail($req->id);
        //On retourne le nombre de vue de la ressource et on l'incremente dans la bdd
        $myres->nbvus = $myres->nbvus + 1;
        $myres->save();
        return view('pages.ressource.ressource',compact('myres'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mycat = Catalogue::first()->get();
        return view('pages.ressource.add', compact('mycat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        // on genere un nom unique pour notre image 
        $filename = 'img-' . Carbon::now()->format('YmdHs');
        // On recupere l'image dans la requete
        $file= $req->file('mymedia');
        // on stocke l 'image avec le nouveau nom unique 
        $file->storeAs('dbimg/ressource', $filename);

        //On cree une nouvelle ressource 
        $ct = new Ressource;
        $ct->titre = $req->titre;
        $ct->corps = $req->corps;
        $ct->media= $filename;                      // nom de fichier unique pour l image 
        $ct->user_id = 1;                           // ce sera id du user connecté 
        $ct->catalogue_id = $req->catalogue_id ;    // id du lib du catalogue  
        $ct->titre = $req->titre;
        $ct->nbvus = 0;
        $ct->nblikes = 0;
        $ct->save();

        //On retrourne la visualisation generale des ressources, notre ressource y sera en premier 
        return redirect(route('lressource'))->with('success', "Votre ressource a bien été prise en compte " );    
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ressource $ressource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRessourceRequest $request, Ressource $ressource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ressource $ressource)
    {
        //
    }
}
