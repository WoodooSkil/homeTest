<?php

use Page\VideoPage;

class CheckTrailerYVCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $dat_searchText = 'ураган';
        $page = new VideoPage();

        $I->wantTo('Проверить трейлер у видео, найденного по слову "' . $dat_searchText . '".');

        $I->goToVideoPage($I);
        $I->search($I, $dat_searchText);

        $I->dontSeeElement($page::$videoPreview);
        $I->dontSeeVisualChanges("videoWithoutFocusPreview", $page::$searchResultPreview);

        $I->moveMouseOver($page::$searchResult);
        $I->waitForElementVisible($page::$videoPreview);

        $I->dontSeeVisualChanges("videoWithFocusPreview", $page::$searchResultPreview);
        $I->wait(1);
        $I->dontSeeVisualChanges("videoWithoutFocusPreview1sec", $page::$searchResultPreview);
    }
}
