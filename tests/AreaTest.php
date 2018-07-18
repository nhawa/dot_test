<?php


class AreaTest extends TestCase
{
    public function testSearchProvince()
    {
        $apikey = base64_encode('test123123');
        $user = factory(\App\User::class)->create([
            'email'     => 'testlogin@user.com',
            'password'  => app('hash')->make('toptal123'),
            'api_key'   => $apikey
        ]);
        $headers = ['apikey' => $apikey];
        //test with source from DB
        config(['app.area_source'=>'DB']);
        $this->json('GET', 'search/provinces?id=10', [],$headers)
            ->seeJsonStructure([
                "status",
                "response" =>[
                    "province_id",
                    "province"
                ]
            ])
            ->assertResponseStatus(200);
        //test with source from Rajaongkir
        config(['app.area_source'=>'RO']);
        $this->json('GET', 'search/provinces?id=10', [],$headers)
            ->seeJsonStructure([
                "status",
                "response" =>[
                    "province_id",
                    "province"
                ]
            ])
            ->assertResponseStatus(200);
        $user->delete();
    }


    public function testSearchCity()
    {
        $apikey = base64_encode('test123123');
        $user = factory(\App\User::class)->create([
            'email'     => 'testlogin@user.com',
            'password'  => app('hash')->make('toptal123'),
            'api_key'   => $apikey
        ]);
        $headers = ['apikey' => $apikey];
        //test with source from DB
        config(['app.area_source'=>'DB']);
        $this->json('GET', 'search/cities?id=10', [],$headers)
            ->seeJsonStructure([
                "status",
                "response" =>[
                    "city_id",
                    "province_id",
                    "province",
                    "type",
                    "city_name",
                    "postal_code"
                ]
            ])
            ->assertResponseStatus(200);
        //test with source from Rajaongkir
        config(['app.area_source'=>'RO']);
        $this->json('GET', 'search/cities?id=10', [],$headers)
            ->seeJsonStructure([
                "status",
                "response" =>[
                    "city_id",
                    "province_id",
                    "province",
                    "type",
                    "city_name",
                    "postal_code"
                ]
            ])
            ->assertResponseStatus(200);
        $user->delete();
    }
}
