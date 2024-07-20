<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentaireRequest;
use App\Http\Requests\UpdateCommentaireRequest;
use Illuminate\Http\Request;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        //
        if ($req->comment != "")  {
                        //On memorise le contact dans la base
                        $ct = new Commentaire;
                        $ct->corps = $req->comment;
                        $ct->user_id = $req->user()->id;    // ce sera id du user connecté $req->input('prenom');
                        $ct->ressource_id = $req->r_id ;    // id de la ressource 
                        $ct->save();
                        return redirect( route('ressource', ['id' => $req->r_id]))->with('success', "Votre comentaire a été pris en compte " );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $commentaires = Commentaire::latest(); 
        $commentaires = $commentaires->paginate(10);
        
    
        return view('pages.commentaire.list',  compact('commentaires'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentaireRequest $request, Commentaire $commentaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commentaire $commentaire)
    {
        //
    }

    public function statecomm(Request $req)
    {
        $ct = Commentaire::findOrFail($req->id);
        if ($req->isactif == 1) {
            $ct->isactif = 0;
        } else {
            $ct->isactif = 1;
        }
        $ct->save();
        return back()->with('success', "Le commentaire a été mis à jour " );
    }
}
