<?php

namespace App\Service;

use App\Helper\LoggerTrait;
use Maknz\Slack\Client;

class SlackClient
{
    use LoggerTrait;

    private $slack;

    public function __construct(Client $slack)
    {
        $this->slack = $slack;
    }

    public function sendMessage(string $from, string $message)
    {
        $this->logInfo('Beaming a message to Slack!', [
            'message' => $message
        ]);

        $slackMessage = $this->slack->createMessage()
                               ->from('Khan')
                               ->withIcon(':ghost:')
                               ->setText('Ah, Kirk, my old friend...');
        $this->slack->sendMessage($slackMessage);
    }
}
