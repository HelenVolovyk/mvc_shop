<?php


use App\Models\Order;
use Codeception\Stub\Expected;


class OrderTest extends \Codeception\Test\Unit
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

    // tests
    public function testSomeFeature()
    {
		$order = $this->make(Order::class, [
			'save' => Expected::never()
		]);

		
    }
}