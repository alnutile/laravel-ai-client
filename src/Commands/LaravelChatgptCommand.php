<?php

namespace Alnutile\LaravelChatgpt\Commands;

use Illuminate\Console\Command;

class LaravelChatgptCommand extends Command
{
    public $signature = 'laravel-chatgpt';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
