<?php


namespace viktigpetterr\bellan\restaurants;

/**
 * Class Spill
 * @package bellan\restaurants
 */
class Spill extends Restaurant
{
    private const NAME = 'SPILL';
    private const URL = 'https://restaurangspill.se/';
    private const REGEX = '/&nbsp;<\/p><p>(.+?)<\/p><p>|<span style="font-size: 1.5rem;">(.+? &nbsp;)<\/s/';

    /**
     * @inheritDoc
     */
    public function parse(string $html = ''): array
    {
        if (empty($html))
        {
            $html = $this->request(self::URL);
        }
        if (!empty($html))
        {
            preg_match_all(self::REGEX, $html, $matches);
            $matches1 = $matches[1];
            $matches2 = $matches[2];
            $matches = array_merge($matches1, $matches2);

            foreach ($matches as $match) {
                if (!empty($match))
                {
                    $match = str_replace('&nbsp;', ' ', $match);
                    $match = str_replace('  ', ' ', $match);
                    $match = trim(html_entity_decode($match));
                    $this->dishes[] = trim($match);
                }
            }
        }

        return $this->dishes;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return self::NAME;
    }
}