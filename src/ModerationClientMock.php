<?php

namespace Alnutile\LaravelChatgpt;

use Alnutile\LaravelChatgpt\Contracts\ModerationClientContract;

class ModerationClientMock implements ModerationClientContract
{
    public function checkOk($phrase): bool|\Exception
    {
        return true;
    }
}
