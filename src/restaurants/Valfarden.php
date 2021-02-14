<?php


namespace viktigpetterr\lunchtime\restaurants;

/**
 * Class Valfarden
 * @package lunchtime\restaurants
 */
class Valfarden extends Restaurant
{
    private const NAME = 'Välfärden';
    private const URL = 'https://valfarden.nu/dagens-lunch/';
    private const REGEX = '/<div class="gmail_default" .+">(.+)<\/div>/';

    /**
     * @inheritDoc
     * @return string[]
     */
    public function parse(string $html = ''): array
    {
        if (empty($html))
        {
            $html = $this->request(self::URL);
        }
        preg_match_all(self::REGEX, $html, $matches);
        $date = $this->getDate();
        $matches = $matches[1];
        foreach ($matches as $key => $match)
        {
            if (strstr($match, " $date ") && key_exists($key + 1, $matches))
            {
                $this->dishes[] = htmlspecialchars_decode($matches[$key + 1]);
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

    /**
     * @return string
     */
    private function getDate(): string
    {
        $date = date('d');
        if ($date[0] === '0')
        {
            $date = substr($date, 1);
        }

        return $date;
    }
}