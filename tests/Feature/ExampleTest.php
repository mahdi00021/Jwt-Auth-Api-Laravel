<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /**
     * Login as default API user and get token back.
     *
     * @return void
    */
    public function testLogin()
    {
        $baseUrl = 'http://localhost:8000' . '/api/auth/login';
        $email = 'm73hdi@gmail.com';
        $password = '123456';

        $response = $this->json('POST', $baseUrl . '/', [
            'email' => $email,
            'password' => $password
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'access_token', 'token_type', 'expires_in'
            ]);
    }

    /**
     * Test logout.
     *
     * @return void
     */
    public function testLogout()
    {
        $user = User::where('email', 'm73hdi@gmail.com')->first();
        $token = JWTAuth::fromUser($user);
        $baseUrl = 'http://localhost:8000' . '/api/auth/logout?token=' . $token;

        $response = $this->json('POST', $baseUrl, []);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'message' => 'Successfully logged out'
            ]);
    }

    /**
     * Test token refresh.
     *
     * @return void
     */
    public function testRefresh()
    {
        $user = User::where('email',  'm73hdi@gmail.com')->first();
        $token = JWTAuth::fromUser($user);
        $baseUrl = 'http://localhost:8000' . '/api/auth/refresh?token=' . $token;

        $response = $this->json('POST', $baseUrl, []);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'access_token', 'token_type', 'expires_in'
            ]);
    }


    /**
     * Get all foods menu.
     *
     * @return void
     */
    public function testGetFoodsMenu()
    {
        $user = User::where('email',  'm73hdi@gmail.com')->first();
        $token = JWTAuth::fromUser($user);
        $baseUrl = 'http://localhost:8000'. '/api/menu?token=' . $token;

        $response = $this->json('GET', $baseUrl . '/', []);

        $response->assertStatus(200);
    }

    /**
     * Order Foods.
     *
     * @return void
     */
    public function testOrderFoods()
    {
        $user = User::where('email',  'm73hdi@gmail.com')->first();
        $token = JWTAuth::fromUser($user);
        $baseUrl = 'http://localhost:8000'. '/api/orderFood?token=' . $token;

        $response = $this->json('POST', $baseUrl . '/', [
            'food_name' => 'Ham and Cheese Toastie',
            'food_id' => 1,
            'count' => 3,
            'price' => 12000,
        ]);


        $response->assertStatus(200);
    }

}
