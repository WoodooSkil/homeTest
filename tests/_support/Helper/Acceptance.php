<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Acceptance extends \Codeception\Module
{
    function goToVideoPage($I)
    {
        $I->amGoingTo(\Page\VideoPage::$URL);
        $I->amOnPage(\Page\VideoPage::$URL);
        $I->waitForElementClickable(\Page\VideoPage::$searchButton);
    }

    function search($I, string $text)
    {
        $I->fillField(\Page\VideoPage::$searchField, $text);
        $I->click(\Page\VideoPage::$searchButton);
        $I->waitForElementNotVisible(\Page\VideoPage::$searchLoadCap);
    }

}
