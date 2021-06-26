<?php

namespace viktigpetterr\Bellan\Restaurant;

/**
 * Class Spill
 * @package Bellan\Restaurant
 */
class Spill extends Restaurant
{
    private const NAME = 'SPILL';
    private const URL = 'https://restaurangspill.se/';
    private const REGEX =
        '/<\/span><\/p><p>(.+)<\/span><\/p><p><span style="font-size: 1.5rem;"><br><\/span><\/p><p>/U';

    /**
     * @inheritDoc
     */
    public function parse(string $html = ''): array
    {
        if (empty($html)) {
            $html = $this->request(self::URL);
        }
        if (!empty($html)) {
            preg_match_all(self::REGEX, $html, $matches);
            $matches = $matches[1];
            foreach ($matches as $match) {
                if (!empty($match)) {
                    $rawDishes = preg_split('/<\/p><br><p><span style="font-size: 1.5rem;">/', $match);
                    foreach ($rawDishes as $rawDish) {
                        $rawDish = str_replace('&nbsp;', ' ', $rawDish);
                        $rawDish = str_replace('  ', ' ', $rawDish);
                        $rawDish = trim(html_entity_decode($rawDish));
                        $this->dishes[] = trim($rawDish);
                    }
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
     * @inheritDoc
     */
    public function getURL(): string
    {
        return self::URL;
    }
}
