<?php

namespace Alnutile\LaravelChatgpt\Facades;

use Illuminate\Support\Facades\Facade;

class ImageClientFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'ai_image_client';
    }
}
