<?php

namespace Alnutile\LaravelChatgpt\Contracts;

interface ModerationClientContract
{
    public function checkOk($phrase): bool|\Exception;
}
