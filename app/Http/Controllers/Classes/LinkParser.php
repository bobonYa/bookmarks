<?php


namespace App\Http\Controllers\Classes;

use Illuminate\Support\Facades\Http;
use PHPHtmlParser\Dom;


class LinkParser
{

    /**
     * @param $url
     * @return array
     * @throws \PHPHtmlParser\Exceptions\ChildNotFoundException
     * @throws \PHPHtmlParser\Exceptions\CircularException
     * @throws \PHPHtmlParser\Exceptions\ContentLengthException
     * @throws \PHPHtmlParser\Exceptions\LogicalException
     * @throws \PHPHtmlParser\Exceptions\NotLoadedException
     * @throws \PHPHtmlParser\Exceptions\StrictException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public static function getPageData($url): array
    {
        $domain = parse_url($url, PHP_URL_SCHEME) . "://" . parse_url($url, PHP_URL_HOST);
        $dom = new Dom;
        $dom->loadFromUrl($url);
        $titleDom = $dom->find('title');
        if (count($titleDom)) {
            $title = $titleDom->text;
        }
        $descriptionDom = $dom->find('[name="description"]');
        if (count($descriptionDom)) {
            $description = $descriptionDom->getAttribute('content');
        }
        $keywordsDom = $dom->find('[name="keywords"]');
        if (count($keywordsDom)) {
            $keywords = $descriptionDom->getAttribute('content');
        }
        $faviconDom = $dom->find('[rel="shortcut icon"]');
        if (count($faviconDom)) {
            $favicon = $faviconDom->getAttribute('href');
            if (!strncmp($favicon, '//', 2)) {
                $favicon = str_replace('//', parse_url($url, PHP_URL_SCHEME) . "://", $favicon);
            }
            if (!parse_url($favicon, PHP_URL_SCHEME)) {
                $favicon = $domain . $favicon;
            }


        }

        return (
        [
            'link' => $url,
            'title' => $title ?? "",
            'description' => $description ?? "",
            'keywords' => $keywords ?? "",
            'favicon' => $favicon ?? "",
        ]

        );


    }
}
