<?php

namespace Alnutile\LaravelChatgpt\Tests;

use Facades\Alnutile\LaravelChatgpt\TextClient;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class TextClientTest extends TestCase
{
    public function test_text_client()
    {
        $data = File::get(__DIR__.'/fixtures/text_response.json');

        Http::fake(
            [
                'api.openai.com/*' => Http::response($data, 200),
            ]
        );
        $results = TextClient::text('Test');
        Http::assertSentCount(1);
    }

    public function test_setters()
    {
        $data = File::get(__DIR__.'/fixtures/text_response.json');

        Http::fake(
            [
                'api.openai.com/*' => Http::response($data, 200),
            ]
        );
        $results = TextClient::setTemperature(.7)
            ->setMaxTokens(1000)
            ->setContext('some previous content')
            ->addPrefix('Can you write for me the next chapter after this one')
            ->text('Test');
        Http::assertSentCount(1);
        Http::assertSent(function (Request $request) {
            return data_get($request, 'context') === 'some previous content';
        });
    }

    public function test_prefix()
    {
        $data = File::get(__DIR__.'/fixtures/text_response.json');

        $data = json_decode($data, true);

        Http::fake(
            [
                'api.openai.com/*' => Http::response($data, 200),
            ]
        );
        $results = TextClient::addPrefix('foobar')->text('Test');
        Http::assertSent(function (Request $request) {
            return $request->data()['prompt'] === 'foobar Test';
        });
    }
}
