<?php

namespace Alnutile\LaravelChatgpt;

use Alnutile\LaravelChatgpt\Contracts\ModerationClientContract;

class ModerationClient extends LaravelChatgpt implements ModerationClientContract
{
    public function checkOk($phrase): bool|\Exception
    {
        logger('Checking phrase', [$phrase]);
        $body = [
            'input' => $phrase,
        ];

        $response = $this->client()
            ->post(
                $this->fullUrl('moderations'),
                $body
            );

        if ($response->failed()) {
            logger($response->json());
            throw new \Exception('Error with response');
        }

        $data = $response->json();

        $flagged = data_get($data, 'results.0.flagged');

        if ($flagged !== false) {
            logger('Failed Moderation '.$phrase);
        }

        return $flagged;
    }
}
