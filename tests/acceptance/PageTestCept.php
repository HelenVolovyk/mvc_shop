<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->see('Lorem ipsum dolor sit'); 
$I->amOnPage('/about');
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK);
$I->see('about'); 