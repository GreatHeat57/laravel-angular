<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function after_login_user_can_not_access_home_page_until_verified() 
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $this->get('/home')->assertRedirect('/');  
    }

    public function after_login_user_can_access_home_page_if_verified() 
    {
        $user = factory(User::class)->create(['isVerified'=> 1 ]);
        $this->actingAs($user);
        $this->get('/home')->assertStatus(200);  
    }
}
