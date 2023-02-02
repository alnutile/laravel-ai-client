<?php

namespace Alnutile\LaravelChatgpt\DTOs;

class MessageCaster implements \Spatie\DataTransferObject\Caster
{
    public function cast(mixed $value): mixed
    {
        return str($value)->replace("\n", '<br>')->toString();
    }
}
