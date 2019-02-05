<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlphaTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDisplayAlpha()
    {
        $response  = $this->get('/alpha');
        $response->assertSee('Alpha');
        $response->assertDontSee('Beta page');
    }  
}
