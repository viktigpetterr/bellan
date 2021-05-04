<?php


namespace viktigpetterr\Bellan\Restaurant;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class Restaurant
 * @package Bellan\Restaurant
 */
abstract class Restaurant implements RestaurantInterface
{

    protected Client $client;
    /**
     * @var string[] $menus
     */
    protected array $dishes;

    /**
     * Restaurant constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
        $this->dishes = [];
    }

    /**
     * GET request for the html containing lunch dishes.
     *
     * @param string $url
     * @return string|null
     */
    protected function request(string $url): ?string
    {
        try
        {
            return $this->client->get($url)->getBody()->getContents();
        }
        catch (GuzzleException $e)
        {
            printf($e);

            return null;
        }
    }

    /**
     * Validate the dishes by checking the non-existence of html tags.
     *
     * @return bool
     */
    protected function validDishes(): bool
    {
        foreach ($this->dishes as $dish)
        {
            if (preg_match('/[<>]/', $dish) || empty($dish))
            {
                return false;
            }
        }

        return true;
    }

}
