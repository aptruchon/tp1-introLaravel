<?php

namespace Tests\Unit;

use App\Models\Equipe;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }

    public function test_findAll()
    {
        $membres = Equipe::findAll();
        $this->assertIsArray($membres);
        $this->assertCount(4, $membres);
    }

    public function test_findOne()
    {
        $membres = Equipe::findOne(1);
        $this->assertIsObject($membres);
        $this->assertEquals('Burger', Equipe::findOne(2)->nom);
        $this->assertNull(Equipe::findOne(''));
        $this->assertNull(Equipe::findOne('TER15'));
    }

    public function test_findRandom()
    {
        $compteur = 0;

        // Je lance 10000 fois 2 findRandom
        for ($i=0, $l = 10000; $i < $l ; $i++) {
            $membre = Equipe::findRandom();
            $this->assertIsObject($membre);
            
            // Copie de findRandom
            $joueurs = Equipe::findAll();
            $nbJoueurs = count($joueurs);
            $id = random_int(1, $nbJoueurs) - 1;

            /* Si l'id du membre retourné par Equipe::findRandom()
            et l'id généré par la copie de la fonction matchent, on incremente le compteur. */
            if($membre->id == $id){
                $compteur++;
            }
        }
        // S'il y a moins de 2000 matchs, le test passe.
        $this->assertLessThan(2000, $compteur);

        // Donc il y a moins de 20% de chance que les 2 randoms matchent lorsqu'ils sont lancé en même temps.
    }
}