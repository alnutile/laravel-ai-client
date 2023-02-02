<?php

namespace Alnutile\LaravelChatgpt\Tests;

use Alnutile\LaravelChatgpt\DTOs\ResponseDto;
use Facades\Alnutile\LaravelChatgpt\TextClientMock;
use Illuminate\Support\Facades\Http;

class TestMockClient extends TestCase
{
    public function test_mock_client()
    {
        Http::fake();
        $results = TextClientMock::text('foobar');
        $this->assertInstanceOf(ResponseDto::class, $results);
        $this->assertNotNull($results->search_term);
        Http::assertSentCount(0);
    }
}
