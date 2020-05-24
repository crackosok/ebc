<?php

namespace tests\unit\models;

use app\models\User;

class UserTest extends \Codeception\Test\Unit
{
    public function testFindUserById()
    {
        expect_that($user = User::findIdentity(1));
        expect($user->username)->equals('ebc');

        expect_not(User::findIdentity(999));
    }

    public function testFindUserByAccessToken()
    {
        $user = User::findIdentity(1);
        expect_that($userByToken = User::findIdentityByAccessToken($user->access_token));
        expect($userByToken->username)->equals($user->username);

        expect_not(User::findIdentityByAccessToken('non-existing'));        
    }

}
