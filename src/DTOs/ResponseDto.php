<?php

namespace Alnutile\LaravelChatgpt\DTOs;

use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

class ResponseDto extends DataTransferObject
{
    /**
     * @var ResponseMessageDto[] array
     */
    #[MapFrom('choices')]
    #[CastWith(ResponseCaster::class)]
    public array $messages;

    #[MapFrom('id')]
    public string $id;

    #[MapFrom('search_term')]
    public ?string $search_term;

    #[MapFrom('model')]
    public string $model;

    #[MapFrom('usage.completion_tokens')]
    public ?string $completion_tokens;

    #[MapFrom('usage.prompt_tokens')]
    public string $prompt_tokens;
}
