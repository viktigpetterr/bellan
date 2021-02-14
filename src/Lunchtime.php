<?php


namespace viktigpetterr\lunchtime;


use Maknz\Slack\Client;
use viktigpetterr\lunchtime\restaurants\Restaurant;

/**
 * Class Lunchtime
 * @package lunchtime
 */
class Lunchtime
{

    private Client $slack;

    /**
     * @var Restaurant[]
     */
    private array $restaurants;

    /**
     * Lunchtime constructor.
     * @param string       $hookUrl
     * @param Restaurant[] $restaurants
     */
    public function __construct(string $hookUrl, array $restaurants)
    {
        $this->slack = new Client($hookUrl);
        $this->restaurants = $restaurants;
    }

    public function execute(): void
    {
        foreach ($this->restaurants as $restaurant) {
            $dishes = $restaurant->parse();
            foreach ($dishes as $dish)
            {
                printf($dish . "\n");
            }
        }
    }

}