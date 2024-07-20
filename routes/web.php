<?php
 
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Controllers\ContactController; 
use App\Http\Controllers\RessourceController; 
use App\Http\Controllers\CommentaireController; 


Route::get('/', function () {
    return redirect(route('lressource'));
})->name('home');

Route::get('toto', [CommentaireController::class, 'show'] )->name('toto');

// debut de gestion des utilisateurs - il n y a que la liste 
Route::get('user', function () {
    $users = User::latest()->get();    
    return view('pages.user.user',  compact('users'));
})->middleware('auth', 'NatUser:AdminApp')->name('user');

//Mise a dispo du formulaite de contact 
Route::get('contact', [ContactController::class, 'create'])->name('contact');
//traitement des inscriptions sur le site - demandes stockee dans une table 
Route::post('pcontact', [ContactController::class, 'store'])->name('pcontact');
//Mise a dispo de la liste des contacts - acces restreint au AdminApp
Route::get('lcontact/{sujet?}', [ContactController::class, 'index'])->middleware('auth', 'NatUser:AdminApp')->name('lcontact');
//Mise a dispo du formulaire pour la mise a jour du traitement d'une demande de contact 
Route::get('mcontact/{id}', [ContactController::class, 'mtraite'])->middleware('auth', 'NatUser:AdminApp')->name('mcontact');
//Stockage de la mise a jour dans la base, on reçoit id et le texte du traitement 
Route::post('pmcontact', [ContactController::class, 'pmtraite'])->middleware('auth', 'NatUser:AdminApp')->name('pmcontact');



//Mise à dispostion du contenu des ressources du site
Route::get('lressource', [RessourceController::class, 'index'])->name('lressource');
//Visualiser une ressource, en donnant  par son identifiant 
Route::get('ressource/{id}', [RessourceController::class, 'show'])->name('ressource');
//ajout une ressource - il faut etre autentifié 
Route::get('fressource', [RessourceController::class, 'create'])->middleware('auth')->name('fressource');
//ajout une ressource  - il faut etre autentifié 
Route::post('pressource', [RessourceController::class, 'store'])->middleware('auth')->name('pressource');


//Ajout de commentaire - il faut etre autentifié 
Route::post('pcomm',  [CommentaireController::class, 'store'])->middleware('auth')->name('pcomm');


//accès aux images, comme elles sont dans un repertoire privé, on passe par un Route pour trasmettre le contenu de l image 
Route::get('res-img/{fn}', function($fn) {
    // on va chercher dans le repertoire storage/app/dbimg/ressource/le fichier a telecharger 
    return response()->download(Storage::disk('local')->path('dbimg/ressource/' . $fn));
})->name('res-img');

// ajout Breeze --- ces routes ne sont pas utilisée 
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

// fin ajout Breeze 

//enforce HTTPS
URL::forceScheme('https');


// Chope tout et renvoie un message WIP 
Route::fallback(function () { return redirect(route('lressource'))->with('success', 'Nulle part ailleurs ...WIP'); })->name('catchall');
