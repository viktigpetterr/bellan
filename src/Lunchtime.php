<?php


namespace viktigpetterr\lunchtime;


use GuzzleHttp\Exception\ConnectException;
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
     * @param string       $webhook
     * @param Restaurant[] $restaurants
     */
    public function __construct(string $webhook, array $restaurants)
    {
        $options =
            [
                'username' => 'Herr Roos',
            ];
        $this->slack = new Client($webhook, $options);
        $this->restaurants = $restaurants;
    }

    /**
     * @return string|null
     */
    public function execute(): ?string
    {
        $message = $this->createMessage();
        try
        {
            $this->slack->send($message);
        }
        catch (ConnectException)
        {
            return $message;
        }

        return null;
    }

    /**
     * @return string
     */
    private function createMessage(): string
    {
        $message = self::getMessageHeader();
        foreach ($this->restaurants as $restaurant) {
            $dishes = $restaurant->parse();
            $message .= "\t$restaurant:\n";
            foreach ($dishes as $dish)
            {
                //printf($dish . "\n");
                $message .= "\t\t - $dish\n";
            }
            $message .= "\n";
        }
        $message .= self::getMessageFooter();

        return $message;
    }

    /**
     * @return string
     */
    private static function getMessageHeader(): string
    {
        return "God förmiddag! Bellan här. Idag serveras följande lunchalternativ:\n\n";
    }

    /**
     * @return string
     */
    private static function getMessageFooter(): string
    {
        return "\nSmaklig spis!";
    }

}