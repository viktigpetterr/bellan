<?php


namespace lunchtime\restaurants;


/**
 * Interface RestaurantInterface
 * @package lunchtime\restaurants
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