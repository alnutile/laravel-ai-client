<?php

namespace Alnutile\LaravelChatgpt\Tests;

use Facades\Alnutile\LaravelChatgpt\TextClientMock;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class TextClientMockTest extends TestCase
{
    public function test_text_client()
    {
        $data = File::get(__DIR__.'/fixtures/text_response.json');

        Http::fake();
        $results = TextClientMock::text('Test');
        Http::assertSentCount(0);
    }

    public function test_prefix()
    {
        $data = File::get(__DIR__.'/fixtures/text_response.json');
        Http::fake();
        TextClientMock::addPrefix('foobar')->text('Test');
        Http::assertSentCount(0);
    }
}
