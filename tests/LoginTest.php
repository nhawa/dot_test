<?php


class LoginTest extends TestCase
{
    public function testRequiresEmailAndLogin()
    {
        $this->json('POST', 'login')
            ->seeJson([
                "status"        => 500,
                "error_msgs"    => "The given data was invalid."
            ])
            ->assertResponseStatus(200);
    }


    public function testUserLoginsSuccessfully()
    {
        $user = factory(\App\User::class)->create([
            'email' => 'testlogin@user.com',
            'password' => app('hash')->make('toptal123'),
        ]);

        $payload = ['email' => 'testlogin@user.com', 'password' => 'toptal123'];

        $this->json('POST', 'login', $payload)
            ->seeJsonStructure([
                "status",
                "apikey"
            ])
            ->assertResponseStatus(200);
        $user->delete();
    }
}
