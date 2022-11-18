<?php

use App\Models\Equipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

$langValidator = '^(fr|en)$';

// Route pour Équipe
Route::get('/{lang}/equipe', function ($lang, Request $request) {
    // Entré de type débug pour le log
    Log::debug("Route \"" .$request->getRequestUri(). "\" demandée");
    App::setLocale($lang);

    $allMembers = Equipe::findAll();          // Model

    return response()->json([
        'allMembers' => $allMembers,
    ]);
})->where('lang', $langValidator);

// Je triche ici car sans id{id}, la route "/{lang}/equipe/random" entre dans la route id
// Même si je valide le 3ieme parametre en temps que chiffre, si je redirige, je vais repasser ici. Loop infini
Route::get('/{lang}/equipe/id{id}', function ($lang, $id, Request $request) { // Controller + Route
    // Entré de type débug pour le log
    Log::debug("Route \"" .$request->getRequestUri(). "\" demandée");

    App::setLocale($lang);

    $member = Equipe::findOne($id);          // Model

    if (!$member) {                           // Validation du Model
        abort(404);                           // Controller
    }

    return response()->json([
        'member' => $member,
    ]);
})->where('lang', $langValidator);            // Controller + Route


Route::get('/{lang}/equipe/random', function ($lang, Request $request) { // Controller + Route
    // Entré de type débug pour le log
    Log::debug("Route \"" .$request->getRequestUri(). "\" demandée");
    App::setLocale($lang);
    $member = Equipe::findRandom();          // Model

    if (!$member) {                           // Validation du Model
        abort(404);                           // Controller
    }

    return response()->json([
        'member' => $member,
    ]);
})->where('lang', $langValidator);            // Controller + Route