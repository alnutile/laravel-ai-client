<?php

namespace Alnutile\LaravelChatgpt\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Alnutile\LaravelChatgpt\LaravelChatgpt
 */
class ModerationClientFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ai_moderation_client';
    }
}
