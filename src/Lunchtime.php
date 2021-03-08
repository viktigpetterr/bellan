<?php


namespace viktigpetterr\bellan;


use GuzzleHttp\Exception\ConnectException;
use Maknz\Slack\Client;
use viktigpetterr\bellan\restaurants\Restaurant;

/**
 * Class Lunchtime
 * @package bellan
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
     * @param string[] $restaurants
     */
    public function __construct(string $webhook, array $restaurants)
    {
        $options =
            [
                'username' => 'Herr Roos',
            ];
        $this->slack = new Client($webhook, $options);

        foreach ($restaurants as $restaurant)
        {
            $restaurant = "viktigpetterr\\bellan\\restaurants\\$restaurant";
            $this->restaurants[] = new $restaurant;
        }
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
        catch (ConnectException $e)
        {
            return "$message\n\n\n{$e->getMessage()}";    
        }

        return $message;
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