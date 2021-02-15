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

    public function execute(): void
    {
        $message = $this->getMessageHeader();
        foreach ($this->restaurants as $restaurant) {
            $dishes = $restaurant->parse();
            $message .= "\t$restaurant:\n";
            foreach ($dishes as $dish)
            {
                printf($dish . "\n");
                $message .= "\t\t - $dish\n";
            }
            $message .= "\n";
        }
        $message .= $this->getMessageFooter();
        $this->slack->send($message);
    }

    private function getMessageHeader(): string
    {
        return "God förmiddag! Bellan här. Idag serveras följande lunchalternativ:\n\n";
    }

    private function getMessageFooter(): string
    {
        return "\nSmaklig spis!";
    }

}