<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegRequestTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function test_register_request()
    {
        $response = $this->call('POST','/registration',[
            'name'=>'test',
            'email'=>'test@test.com',
            'telephone'=>'11111111111',
            'password'=>'aaaaaa',
        ]);

        $response->assertLocation('/authorization');
    }
}
