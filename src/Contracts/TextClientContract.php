<?php

namespace Alnutile\LaravelChatgpt\Contracts;

use Alnutile\LaravelChatgpt\DTOs\ResponseDto;

interface TextClientContract
{
    public function text($phrase): ResponseDto|\Exception;
}
