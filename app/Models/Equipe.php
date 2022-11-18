<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe /* extends Model */
{
    public $id;
    public $prenom;
    public $nom;
    public $bio;
    public $poste;

    public function __construct($id, $prenom, $nom, $bio, $poste)
    {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->bio = $bio;
        $this->poste = $poste;
    }

    public static function findAll()
    {
        return [
            new Equipe('1', 'Alice', 'In wonderland', 'Tall person born in paris', "Rêveuse"),
            new Equipe('2', 'Bob', 'Burger', "A arrêté l'école à 9 ans", 'Cook'),
            new Equipe('3', 'Cedric', 'Digori', 'Est mort jeune', 'Magicien'),
            new Equipe('4', 'Dare', 'Devil', 'A perdu la vue', 'Sound designer')
        ];
    }

    public static function findOne($id)
    {
        foreach (static::findAll() as $joueur) {
            if ($joueur->id == $id) {
                return $joueur;
            }
        }
        return null;
    }

    public static function findRandom()
    {
        $joueurs = static::findAll();
        $nbJoueurs = count($joueurs);
        $id = random_int(1, $nbJoueurs) - 1;
        return $joueurs[$id];
    }
}
