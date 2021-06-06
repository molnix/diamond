<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test  */
    public function a_users_can_browse_main_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /** @test  */
    public function a_users_can_browse_gallery()
    {
        $response = $this->get('/gallery');

        $response->assertStatus(200);
    }
    /** @test  */
    public function a_users_can_browse_location()
    {
        $response = $this->get('/location');

        $response->assertStatus(200);
    }
    /** @test  */
    public function a_users_can_browse_prices()
    {
        $response = $this->get('/prices');

        $response->assertStatus(200);
    }
    /** @test  */
    public function a_users_can_browse_authorization()
    {
        $response = $this->get('/authorization');

        $response->assertStatus(200);
    }
    /** @test  */
    public function a_users_can_browse_registration()
    {
        $response = $this->get('/registration');

        $response->assertStatus(200);
    }
    /** @test  */
    public function a_users_can_browse_passwordReset()
    {
        $response = $this->get('/passwordReset');

        $response->assertStatus(200);
    }
}
