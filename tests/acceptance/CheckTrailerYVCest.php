<?php

class CheckTrailerYVCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $dat_searchText = 'ураган';

        $I->wantTo('Проверить трейлер у видео, найденного по слову "' . $dat_searchText . '".');

        $I->goToVideoPage($I);
        $I->search($I, $dat_searchText);

        //Check a preview without focus does not contain video
        $I->dontSeeElement(\Page\VideoPage::$videoPreview);

        //Check a video appear in preview after focus it
        $I->moveMouseOver(\Page\VideoPage::$searchResult);
        $I->waitForElementVisible(\Page\VideoPage::$videoPreview);
    }
}
