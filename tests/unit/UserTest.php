<?php

use App\Models\User;
use Codeception\Stub\Expected;

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testSomeFeature()
    {
		 $user = $this->make(User::class, [
			 'create' => Expected::once()
		 ]);

		 $fields = [
			 'name' => 'mmvg',
			 'email' => 'email', 
			 'pass' => 'pass'
		 ];
		 $user = new User();
		 $user->create($fields);

    }
}