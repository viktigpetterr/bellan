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
     * @return Menu[]
     */
    public function parse(): array;

    /**
     * Return the name of the restaurant
     *
     * @return string
     */
    public function __toString(): string;
}