<?php

use Page\VideoPage;

class CheckTrailerYVCest
{
    private static $listOfTemporaryUsedFiles = [
        "tests/_output/debug/visual/CheckTrailerYVCest.tryToTest.videoPreview.png",
        "tests/_data/VisualCeption/CheckTrailerYVCest.tryToTest.videoPreview.png",
        "tests/_output/debug/visual/CheckTrailerYVCest.tryToTest.videoPreview2.png",
        "tests/_data/VisualCeption/CheckTrailerYVCest.tryToTest.videoPreview2.png"
        ];

    public function _before(AcceptanceTester $I)
    {
        $I->deleteFilesIfExists($this::$listOfTemporaryUsedFiles);
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
        $I->dontSeeVisualChanges("videoPreview", $page::$searchResultPreview);

        $I->moveMouseOver($page::$searchResult);
        $I->waitForElementVisible($page::$videoPreview);
        $I->seeVisualChanges("videoPreview", $page::$searchResultPreview);

        $I->dontSeeVisualChanges("videoPreview2", $page::$searchResultPreview);
        $I->wait(1);
        $I->seeVisualChanges("videoPreview2", $page::$searchResultPreview);
    }
}