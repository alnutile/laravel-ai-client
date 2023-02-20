<?php

namespace Alnutile\LaravelChatgpt\Facades;

use Alnutile\LaravelChatgpt\DTOs\ResponseDto;
use Illuminate\Support\Facades\Facade;

/**
 * @method TextClientFacade setFrequencyPenalty(float $amount)
 * @method TextClientFacade setPresencePenalty(float $amount)
 * @method TextClientFacade setTemperature(float $amount)
 * @method TextClientFacade addPrefix(string $prefix)
 * @method ResponseDto|\Exception text(string $prefix)
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
