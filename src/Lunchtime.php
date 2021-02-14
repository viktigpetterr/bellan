<?php


namespace viktigpetterr\lunchtime;

use viktigpetterr\lunchtime\restaurants\Restaurant;
use wrapi\slack\slack;

/**
 * Class Lunchtime
 * @package lunchtime
 */
class Lunchtime
{
    private slack $slack;

    /**
     * @var Restaurant[]
     */
    private array $restaurants;

    /**
     * Lunchtime constructor.
     * @param string       $token
     * @param Restaurant[] $restaurants
     */
    public function __construct(string $token, array $restaurants)
    {
        $this->slack = new slack($token);
        $this->restaurants = $restaurants;
    }

    public function execute(): void
    {
        foreach ($this->restaurants as $restaurant) {
            $dishes = $restaurant->parse();
            foreach ($dishes as $dish) {
                printf($dish . "\n");
            }
        }
    }

}