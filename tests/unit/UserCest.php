<?php

use App\Models\User;

class UserCest
{
    public function _before(UnitTester $I)
    {
    }

  
    public function testUserName(UnitTester $I)
    {
		 $user = new User();
		 $user = $user->getUserById(1);
		 $I->assertArrayHasKey('name', $user,  '200');
		 $I->assertArrayHasKey('email', $user,  '200');
		 $I->assertArrayHasKey('pass', $user,  '200');

		 
    }
}