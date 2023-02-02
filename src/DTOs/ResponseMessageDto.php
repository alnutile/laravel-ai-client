<?php

namespace Alnutile\LaravelChatgpt\DTOs;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class ResponseMessageDto extends DataTransferObject
{
    #[MapFrom('message')]
    #[CastWith(MessageCaster::class)]
    public string $message;
}
