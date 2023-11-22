<?php

namespace SophieCalixto\Crawler;

require_once './vendor/autoload.php';

use GuzzleHttp\Client;
use \Symfony\Component\DomCrawler\Crawler;

class CrawlerDefault
{
    private string $url;
    private string $selector;

    public function __construct(string $url, string $selector)
    {
        $this->url = $url;
        $this->selector = $selector;
    }

    public function Query(): array
    {
        $client = new Client();
        $response = $client->get($this->url);
        $html = $response->getBody();

        $crawler = new Crawler($html);
        $elements = $crawler->filter($this->selector);
        $arr = [];

        foreach ($elements as $element) {
            $arr[] = $element->textContent;
        }

        return $arr;
    }
}
