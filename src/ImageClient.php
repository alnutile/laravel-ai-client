<?php

namespace Alnutile\LaravelChatgpt;

use Alnutile\LaravelChatgpt\Contracts\ImageClientContract;
use Alnutile\LaravelChatgpt\DTOs\ImagesResponseDto;

class ImageClient extends LaravelChatgpt implements ImageClientContract
{
    public $prefix = 'Water color image of';

    public function images($phrase): ImagesResponseDto|\Exception
    {
        $body = [
            'prompt' => sprintf('%s %s', $this->prefix, $phrase),
            'n' => 1,
            'size' => '512x512',
        ];

        $response = $this->client()
            ->post(
                $this->fullUrl('images/generations'),
                $body
            );

        if ($response->failed()) {
            logger($response->json());
            throw new \Exception('Error with response');
        }

        $data = $response->json();
        $dto = new ImagesResponseDto($data);

        return $dto;
    }
}
