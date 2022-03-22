<?php
namespace Page;

class VideoPage
{
    // include url of current page
    public static $URL = 'video';

    public static $searchField = 'input[name="text"]';
    public static $searchButton = 'button[type="submit"]';
    public static $searchLoadCap = '.fade_region_main';
    public static $searchResult = '.serp-item_type_search';
    public static $videoPreview = '.thumb-image__preview video.thumb-preview__video';
    public static $searchResultPreview = 'div.serp-item_pos_0 .thumb-image__preview';
}
