<?php


namespace lunchtime\restaurants;

/**
 * Class Valfarden
 * @package lunchtime\restaurants
 */
class Valfarden extends Restaurant
{
    private const NAME = 'Välfärden';
    private const URL = 'https://valfarden.nu/dagens-lunch/';

    /**
     * @return Menu[]
     */
    public function parse(): array
    {
        $this->request(self::URL);

        return [];
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return self::NAME;
    }
}