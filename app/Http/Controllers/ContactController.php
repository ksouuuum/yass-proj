<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        //On cree la requete avec une eventuelle selection sur le sujet
        $contacts = Contact::where('sujet', 'like', '%' . $req->sujet . '%');

        // format des tri  ?sort=nom,-created_at  tri asc sur nom et desc sur created_at    
        // recuerer dans la query les parameters fr tri et mise dans un tableau [ 'nom', '-created_at']
        if ( $req->input('sort', '') != '') { 
                $sorts = explode(',', $req->input('sort', ''));
                
                // on fait le tri un par un 
                foreach ($sorts as $sortColumn) {
                    $sortDirection = str()->startsWith($sortColumn, '-') ? 'desc' : 'asc';    // si attribut  demarre avec - ce sera desc sinon asc 
                    $sortColumn = ltrim($sortColumn, '-');                                  // on enleve le - du début de l'attribut
            
                    $contacts->orderBy($sortColumn, $sortDirection);                           // on applique le tri 
                }
        }
        $contacts = $contacts->paginate(10);
        $contacts->appends(['sujet' => $req->sujet]);
        if ( $req->input('sort', '') != '') $contacts->appends(['sort' => $req->sort]);
        return view('pages.contact.list',  compact('contacts'));     
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.contact.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $validated = $req->validate( [
            'nom' => 'string|required|max:40|min:2',
            'prenom' => 'required|max:40|min:2',
            'email' => 'required|email|max:40',
            'mobile' => 'required|digits:10|numeric',
            'sujet' => 'required',
            'message' => 'required|min:2',
          ],
          [ 'min' => 'l\'information <<:attribute>> est trop courte',
            'max' => 'l\'information <<:attribute>> est trop longue',
          ]
        );
    
        // On compare le timestamp mis dans le formulaire à l'envoi et l'heure du serveur à la récéption 
        // Si ce temps est plus petit que 8 secondes, on suppose qu'un Bot a complété le formulaire 
        // Si _voidtoken n 'est pas vide alors un bot l a rempli 	
        $quantum = time() - $req->input('_btoken'); 
        if (($req->_vtoken == "") && ($quantum > 8)) {
                        //On memorise le contact dans la base
                        $ct = new Contact;
                        $ct->nom = $req->input('nom');
                        $ct->prenom = $req->input('prenom');
                        $ct->email = $req->input('email');
                        $ct->mobile = $req->input('mobile');
                        $ct->ip = $req->ip();
                        $ct->sujet = $req->input('sujet');
                        $ct->message = $req->input('message');
                        $ct->traitement='';
                        $ct->save();
                        return redirect(route('home'))->with('success', "Votre message a bien été pris en compte " );
        }
        return redirect(route('home'))->with('error', "Got you Bot, too greedy or too quick to be real !!! -- " . $quantum);
    }

    /**
     * Mise a dispo du formulaire de mise a  jour du traitement associé a un contact 
     */
    public function mtraite(Request $req)
    {
        //
        $contact = Contact::findOrFail($req->id);
        return view('pages.contact.maj',  compact('contact'));
    }

    /**
     * Mise a jour du traitement associé a un contact dans la base 
     */
    public function pmtraite(Request $req)
    {
        //
        $contact = Contact::findOrFail($req->id);
        $message = $req->message;

        $contact->traitement =  " \r\n " . Carbon::now()->toDateTimeString().  " \r\n " . $req->message . " \r\n-----------------\r\n " . $contact->traitement;
        $contact->traitee = True;
        $contact->save();
        return redirect(route('mcontact', ['id' => $contact->id ]))->with('success', "votre traitement a été enregistré " );
    }

        /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
