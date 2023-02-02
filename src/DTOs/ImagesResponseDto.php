<?php

namespace Alnutile\LaravelChatgpt\DTOs;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;

class ImagesResponseDto extends \Spatie\DataTransferObject\DataTransferObject
{
    /**
     * @var ImageResponseDto[] array
     */
    #[MapFrom('data')]
    #[CastWith(ImageResponseCaster::class)]
    public array $images;
}
