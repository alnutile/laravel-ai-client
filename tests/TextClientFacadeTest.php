<?php

namespace Alnutile\LaravelChatgpt\Tests;

use Alnutile\LaravelChatgpt\DTOs\ResponseDto;
use Alnutile\LaravelChatgpt\Facades\TextClientFacade;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class TextClientFacadeTest extends TestCase
{
    public function test_facade()
    {
        $data = File::get(__DIR__.'/fixtures/text_response.json');

        $data = json_decode($data, true);

        Http::fake(
            [
                'api.openai.com/*' => Http::response($data, 200),
            ]
        );

        $results = TextClientFacade::text('Foobar');
        $this->assertInstanceOf(ResponseDto::class, $results);
        Http::assertSentCount(1);
    }
}
