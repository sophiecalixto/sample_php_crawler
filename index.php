<?php

require_once './vendor/autoload.php';

use SophieCalixto\Crawler\CrawlerDefault;

$Crawler = new CrawlerDefault('https://g1.globo.com/', 'a.feed-post-link p');
var_dump($Crawler->Query());