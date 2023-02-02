<?php

namespace Alnutile\LaravelChatgpt\DTOs;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class ImageResponseDto extends DataTransferObject
{
    #[MapFrom('url')]
    public string $image_url;
}
