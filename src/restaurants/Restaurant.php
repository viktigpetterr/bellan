<?php


namespace lunchtime\restaurants;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\StreamInterface;

/**
 * Class Restaurant
 * @package lunchtime\restaurants
 */
abstract class Restaurant implements RestaurantInterface
{

    protected Client $client;
    /**
     * @var Menu[] $menus
     */
    private array $menus;

    /**
     * Restaurant constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
        $this->menus = [];
    }

    /**
     * GET request for the urls' html body.
     *
     * @param string $url
     * @return StreamInterface|null
     */
    protected function request(string $url): ?StreamInterface
    {
        try
        {
            return $this->client->request($url)->getBody();
        }
        catch (GuzzleException $e)
        {
            printf("\n");
            printf($e);
            printf("\n");

            return null;
        }
    }

    /**
     * @return Menu[]
     */
    public abstract function parse(): array;

    /**
     * @inheritDoc
     */
    public abstract function __toString(): string;
}