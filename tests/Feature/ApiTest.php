<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    public function test_API_equipe_FR()
    {
        $response = $this->getJson('api/fr/equipe');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'allMembers' => [
                '*' => [
                'id',
                'prenom',
                'nom',
                'bio',
                'poste'
                ]
            ]
        ]);
    }
    
    public function test_API_equipe_EN()
    {
        $response = $this->getJson('api/en/equipe');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'allMembers' => [
                '*' => [
                'id',
                'prenom',
                'nom',
                'bio',
                'poste'
                ]
            ]
        ]);
    }

    public function test_API_equipe_Id_FR()
    {
        $response = $this->getJson('api/fr/equipe/id1');
        $response->assertStatus(200);
        $response->assertJsonPath('member.nom', 'In wonderland');
        $response->assertJsonStructure([
            'member' => [
                'id',
                'prenom',
                'nom',
                'bio',
                'poste'
                ]
            ]);
    }
    
    public function test_API_equipe_Id_EN()
    {
        $response = $this->getJson('api/en/equipe/id1');
        $response->assertStatus(200);
        $response->assertJsonPath('member.nom', 'In wonderland');
        $response->assertJsonStructure([
            'member' => [
                'id',
                'prenom',
                'nom',
                'bio',
                'poste'
                ]
            ]);
    }
    
    public function test_API_equipe_random_FR()
    {
        $response = $this->getJson('api/fr/equipe/random');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'member' => [
                'id',
                'prenom',
                'nom',
                'bio',
                'poste'
                ]
            ]);
    }
    
    public function test_API_equipe_random_EN()
    {
        $response = $this->getJson('api/en/equipe/random');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'member' => [
                'id',
                'prenom',
                'nom',
                'bio',
                'poste'
                ]
            ]);
    }
}