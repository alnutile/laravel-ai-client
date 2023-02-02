<?php

namespace Alnutile\LaravelChatgpt\DTOs;

class ResponseCaster implements \Spatie\DataTransferObject\Caster
{
    public function cast(mixed $values): mixed
    {
        $results = [];

        foreach ($values as $value) {
            $message = data_get($value, 'text', null);
            if ($message) {
                $results[] = new ResponseMessageDto(
                    [
                        'message' => $message,
                    ]
                );
            }
        }

        return $results;
    }
}
