<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmailTest extends TestCase
{
    /**
    * @test
    */
    
    public function an_otp_email_is_send_when_user_is_logged_in()
    {
        $user = factory(User::class)->create();

        // $this->actingAs($user);
        $res = $this->post('login', ['email'=>$user->email, 'password'=>'secret']);
        $res->assertRedirect('/');
    }
}
