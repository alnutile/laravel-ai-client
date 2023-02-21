<?php

namespace Alnutile\LaravelChatgpt;

use Alnutile\LaravelChatgpt\DTOs\ResponseDto;
use Illuminate\Support\Facades\File;

class TextClientMock extends TextClient
{
    protected $prexif = null;

    public function text($phrase): ResponseDto|\Exception
    {
        if (! app()->environment('testing')) {
            sleep(3);
        }

        if ($this->prexif) {
            $phrase = sprintf('%s %s', $this->prexif, $phrase);
        }

        if ($path = config('chatgpt.path_to_mock_json')) {
            $mockResponse = File::get($path);
            $mockResponse = json_decode($mockResponse, true);
        } else {
            $mockResponse = File::get(__DIR__.'/../tests/fixtures/text_response.json');
            $mockResponse = json_decode($mockResponse, true);
        }
        $mockResponse = data_get($mockResponse, 'choices.0.text');

        $data = [
            'id' => 'cmpl-6a2rbiefiw76XdXKmMeDGJ2sbKHFS',
            'object' => 'text_completion',
            'created' => 1674048835,
            'model' => 'text-davinci-003',
            'choices' => [
                [
                    'text' => $mockResponse,
                    'index' => 0,
                    'logprobs' => null,
                    'finish_reason' => 'stop',
                ],
            ],
            'usage' => [
                'prompt_tokens' => 3,
                'completion_tokens' => 232,
                'total_tokens' => 235,
            ],
        ];
        $response = new ResponseDto($data);
        $response->search_term = $phrase;

        return $response;
    }
}
