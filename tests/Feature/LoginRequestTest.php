<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginRequestTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /** @test */
    public function test_login_request(){
        User::create([
            'name'=>'test',
            'email'=>'test@test.com',
            'telephone'=>11111111,
            'password'=>Hash::make('test@test.com_aaaaaa'),
            'email_verified'=>true,
        ]);
        $response = $this->call('POST','/authorization',[
            'email'=>'test@test.com',
            'password'=>'aaaaaa',
        ]);
        $response->assertLocation('/profile');
    }
}
