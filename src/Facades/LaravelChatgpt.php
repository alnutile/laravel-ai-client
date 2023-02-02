<?php

namespace Alnutile\LaravelChatgpt\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Alnutile\LaravelChatgpt\LaravelChatgpt
 */
class LaravelChatgpt extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ai_text_client';
    }
}
