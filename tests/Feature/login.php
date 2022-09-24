<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class login extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('login/');

        $response->assertSeeText("USERNAME");
        $response->assertSeeText("PASSWORD");
        $response->assertStatus(200);
    }
}
