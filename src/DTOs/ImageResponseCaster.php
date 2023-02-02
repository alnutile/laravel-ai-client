<?php

namespace Alnutile\LaravelChatgpt\DTOs;

class ImageResponseCaster implements \Spatie\DataTransferObject\Caster
{
    public function cast(mixed $values): mixed
    {
        $images = [];
        foreach ($values as $value) {
            $images[] = new ImageResponseDto($value);
        }

        return $images;
    }
}
