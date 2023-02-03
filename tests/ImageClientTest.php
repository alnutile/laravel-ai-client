<?php

namespace Alnutile\LaravelChatgpt\Tests;

use Alnutile\LaravelChatgpt\DTOs\ImagesResponseDto;
use Alnutile\LaravelChatgpt\ImageClient;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class ImageClientTest extends TestCase
{
    public function test_client()
    {
        $data = File::get(__DIR__.'/fixtures/image_response.json');
        $data = json_decode($data, true);

        Http::fake(
            [
                'api.openai.com/*' => Http::response($data, 200),
            ]
        );

        $results = (new ImageClient())->images('Bob Belcher');
        $this->assertNotEmpty($results);
        $this->assertInstanceOf(ImagesResponseDto::class, $results);
        Http::assertSentCount(1);
    }
}
