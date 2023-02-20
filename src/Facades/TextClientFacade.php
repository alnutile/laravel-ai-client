<?php

namespace Alnutile\LaravelChatgpt\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method TextClientFacade setFrequencyPenalty(float $amount)
 * @method TextClientFacade setPresencePenalty(float $amount)
 * @method TextClientFacade setTemperature(float $amount)
 * @method TextClientFacade addPrefix(string $prefix)
 */
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
