<?php

namespace Alnutile\LaravelChatgpt;

use Alnutile\LaravelChatgpt\Commands\LaravelChatgptCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelChatgptServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-chatgpt')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-chatgpt_table')
            ->hasCommand(LaravelChatgptCommand::class);
    }

    public function bootingPackage()
    {
        $this->app->bind('ai_moderation_client', function () {
            $config = config('chatgpt.mock');
            if ($config) {
                return new ModerationClientMock();
            }

            return new ModerationClient();
        });

        $this->app->bind('ai_text_client', function () {
            $config = config('chatgpt.mock');
            if ($config) {
                return new TextClientMock();
            }

            return new TextClient();
        });

        $this->app->bind('openai_image_client', function () {
            $config = config('chatgpt.mock');

            if ($config) {
                return new ImageClientMock();
            }

            return new ImageClient();
        });
    }
}
