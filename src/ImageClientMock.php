<?php

namespace Alnutile\LaravelChatgpt;

use Alnutile\LaravelChatgpt\Contracts\ImageClientContract;
use Alnutile\LaravelChatgpt\DTOs\ImagesResponseDto;
use Illuminate\Support\Arr;

class ImageClientMock implements ImageClientContract
{
    public function images($phrase): ImagesResponseDto|\Exception
    {
        $images = [
            'image_response.json',
        ];

        $imageResponse = Arr::random($images);

        $data = get_fixture($imageResponse);

        $dto = new ImagesResponseDto($data);

        return $dto;
    }
}
