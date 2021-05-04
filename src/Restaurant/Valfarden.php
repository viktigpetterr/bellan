<?php


namespace viktigpetterr\Bellan\Restaurant;

/**
 * Class Valfarden
 * @package Bellan\Restaurant
 */
class Valfarden extends Restaurant
{
    private const NAME = 'Välfärden';
    private const URL = 'https://valfarden.nu/dagens-lunch/';
    private const REGEX = '/<span style="font-weight: 400;">(.+?)<\/span>/';

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
        if (!empty($html))
        {
            preg_match_all(self::REGEX, $html, $matches);
            $date = $this->getDate();
            $matches = $matches[1];
            foreach ($matches as $key => $match)
            {
                if (str_contains($match, " $date ") && key_exists($key + 1, $matches))
                {
                    $matches = array_slice($matches, $key + 1);
                    $i = 0;
                    $match = $matches[$i];
                    while (isset($match) && !preg_match("/ \d /", $match))
                    {
                        $dish = trim(html_entity_decode($match));
                        $this->dishes[] = htmlspecialchars_decode($dish);
                        ++$i;
                        $match = $matches[$i] ?? null;
                    }

                    break;
                }
            }
        }

        return $this->validDishes() ? $this->dishes : [];
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

    /**
     * @inheritDoc
     */
    public function getURL(): string
    {
        return self::URL;
    }
}
