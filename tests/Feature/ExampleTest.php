<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ErreursTest extends TestCase
{
    public function test_404()
    {
        $response = $this->get('/frt/not-found');
        $response->assertStatus(404);
    }
}