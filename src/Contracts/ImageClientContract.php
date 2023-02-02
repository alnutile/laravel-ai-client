<?php

namespace Alnutile\LaravelChatgpt\Contracts;

use Alnutile\LaravelChatgpt\DTOs\ImagesResponseDto;

interface ImageClientContract
{
    public function images($phrase): ImagesResponseDto|\Exception;
}
