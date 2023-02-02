<?php

namespace Alnutile\LaravelChatgpt\Facades;

use Illuminate\Support\Facades\Facade;

class TextClientFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'ai_text_client';
    }
}
