<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    public function test_Slash()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
        // Voir https://laravel.com/docs/9.x/http-tests#assert-redirect
        $response->assertRedirect('/fr/accueil');
    }


    public function test_Accueil_FR()
    {
        $response = $this->get('/fr/accueil');
        $response->assertStatus(200);
        $response->assertViewHasAll([
            'title' => 'Accueil'
        ]);
        $response->assertViewHas('title', function ($title) {
            return $title == 'Accueil';
        });
    }

    public function test_Accueil_EN()
    {
        $response = $this->get('/en/accueil');
        $response->assertStatus(200);
        $response->assertViewHasAll([
            'title' => 'Accueil'
        ]);
    }


    public function test_Apropos_FR()
    {
        $response = $this->get('/fr/a-propos');
        $response->assertStatus(200);
        $response->assertViewHasAll([
            'title' => 'À propos'
        ]);
        $response->assertViewIs('page');
    }

    public function test_Apropos_EN()
    {
        $response = $this->get('/en/a-propos');
        $response->assertStatus(200);
        $response->assertViewHasAll([
            'title' => 'À propos'
        ]);
        $response->assertViewIs('page');
    }


    public function test_Equipe_FR()
    {
        $response = $this->get('/fr/equipe');
        $response->assertStatus(200);
        $response->assertViewHasAll([
            'title' => 'Équipe'
        ]);
        $response->assertViewIs('membres.all');
    }

    public function test_Equipe_EN()
    {
        $response = $this->get('/en/equipe');
        $response->assertStatus(200);
        $response->assertViewHasAll([
            'title' => 'Équipe'
        ]);
        $response->assertViewIs('membres.all');
    }


    public function test_Contact_FR()
    {
        $response = $this->get('/fr/contact');
        $response->assertStatus(200);
        $response->assertViewHasAll([
            'message' => null
        ]);
        $response->assertViewIs('contact');
    }

    public function test_Contact_EN()
    {
        $response = $this->get('/en/contact');
        $response->assertStatus(200);
        $response->assertViewHasAll([
            'message' => null
        ]);
        $response->assertViewIs('contact');
    }

    public function test_Contact_post_FR()
    {
        $response = $this->post('/fr/contact');
        $response->assertStatus(200);
        $response->assertViewIs('contact');
    }

    public function test_Contact__post_EN()
    {
        $response = $this->post('/en/contact');
        $response->assertStatus(200);
        $response->assertViewIs('contact');
    }
}
