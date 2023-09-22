<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Login page');
    }
    public function formWorks(AcceptanceTester $I)
    {
        $userName = 'Hennadii';
        $I->amOnPage('/');
        $I->fillField('username', $userName);
        $I->fillField('password', 'qwerty');
        $I->click('LOGIN');
        $I->see("Welcome, $userName!");
    }
}
