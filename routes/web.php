<?php

use App\Models\Equipe;
use App\Models\Flight;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// pour tester les regexp: https://regex101.com/
$langValidator = '^(fr|en)$';

// Route de redirection
Route::get('/', function (Request $request) {
    // Entré de type débug pour le log
    Log::debug("Route \"" .$request->getRequestUri(). "\" demandée");
    
    return redirect('/fr/accueil');
});

// Route pour l'accueil
Route::get('/{lang}/accueil', function ($lang, Request $request) {
    // Entré de type débug pour le log
    Log::debug("Route \"" .$request->getRequestUri(). "\" demandée");

    // Configurer la bonne langue pour la requête
    App::setLocale($lang);
    // Retourner la vue
    return view('page', [
        'title' => 'Accueil'
    ]);
})->where('lang', $langValidator); // Validation du paramètre de route

// Route pour À propos
Route::get('/{lang}/a-propos', function ($lang, Request $request) {
    // Entré de type débug pour le log
    Log::debug("Route \"" .$request->getRequestUri(). "\" demandée");

    App::setLocale($lang);
    return view('page', [
        'title' => 'À propos'
    ]);
})->where('lang', $langValidator);

// Route pour contact en GET
Route::get('/{lang}/contact', function ($lang, Request $request) {
    // Entré de type débug pour le log
    Log::debug("Route \"" .$request->getRequestUri(). "\" demandée");

    App::setLocale($lang);
    return view('contact', [
        'message' => null
    ]);
})->where('lang', $langValidator);

// Route pour contact en POST
Route::post('/{lang}/contact', function ($lang, Request $request) {
    // Entré de type débug pour le log
    Log::debug("Route \"" .$request->getRequestUri(). "\" demandée");

    App::setLocale($lang);
    return view('contact', [
        'message' => request('message')
    ]);
})->where('lang', $langValidator);

Route::get('/{lang}/erreur', function(Request $request){
    // Entré de type débug pour le log
    Log::debug("Route \"" .$request->getRequestUri(). "\" demandée");

    throw new InvalidArgumentException('Erreur volontaire');
});






// Route pour Équipe
Route::get('/{lang}/equipe', function ($lang, Request $request) {
    // Entré de type débug pour le log
    Log::debug("Route \"" .$request->getRequestUri(). "\" demandée");

    App::setLocale($lang);

    $allMembers = Equipe::findAll();          // Model
    return view('membres.all', [
        'allMembers' => $allMembers,
        'title' => 'Équipe'
    ]);
})->where('lang', $langValidator);


Route::get('/{lang}/equipe/random', function ($lang, Request $request) { // Controller + Route
    // Entré de type débug pour le log
    Log::debug("Route \"" .$request->getRequestUri(). "\" demandée");
    
    App::setLocale($lang);
    $member = Equipe::findRandom();          // Model
    
    if (!$member) {                           // Validation du Model
        abort(404);                           // Controller
    }
    return view('membres.one', [              // View
        'member' => $member                   // View
    ]);                                       // View
})->where('lang', $langValidator);            // Controller + Route


Route::get('/{lang}/equipe/{id}', function ($lang, $id, Request $request) { // Controller + Route
    // Entré de type débug pour le log
    Log::debug("Route \"" .$request->getRequestUri(). "\" demandée");
    App::setLocale($lang);

    $member = Equipe::findOne($id);          // Model

    if (!$member) {                           // Validation du Model
        abort(404);                           // Controller
    }

    return view('membres.one', [              // View
        'member' => $member                   // View
    ]);                                       // View
})->where('lang', $langValidator);            // Controller + Route





Route::get('/{lang}/vols', function ($lang, Request $request) { // Controller + Route
    // Entré de type débug pour le log
    Log::debug("Route \"" .$request->getRequestUri(). "\" demandée");

    App::setLocale($lang);

    $allFlights = Flight::findAll();          // Model

    return view('flights.all', [              // View
        'allFlights' => $allFlights           // View
    ]);                                       // View
})->where('lang', $langValidator);            // Controller + Route

Route::get('/{lang}/vol/{nom}', function ($lang, $nom, Request $request) { // Controller + Route
    // Entré de type débug pour le log
    Log::debug("Route \"" .$request->getRequestUri(). "\" demandée");

    App::setLocale($lang);

    $flight = Flight::findOne($nom);          // Model

    if (!$flight) {                           // Validation du Model
        abort(404);                           // Controller
    }

    return view('flights.one', [              // View
        'flight' => $flight                   // View
    ]);                                       // View
})->where('lang', $langValidator);            // Controller + Route