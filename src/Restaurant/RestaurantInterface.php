<?php


namespace viktigpetterr\Bellan\Restaurant;

/**
 * Interface RestaurantInterface
 * @package Bellan\Restaurant
 */
interface RestaurantInterface
{
    /**
     * Parse the restaurants lunch alternatives
     *
     * @param string $html
     * @return string[]
     */
    public function parse(string $html = ''): array;

    /**
     * Return the name of the restaurant
     *
     * @return string
     */
    public function __toString(): string;
}