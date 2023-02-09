<?php

namespace Alnutile\LaravelChatgpt;

use Alnutile\LaravelChatgpt\DTOs\ResponseDto;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class LaravelChatgpt
{
    protected $url = 'https://api.openai.com/v1';

    protected $model = 'text-davinci-003';

    /**
     * @see https://beta.openai.com/docs/api-reference/completions/create
     */
    protected $max_tokens = 350; //500

    /*
     * @see https://beta.openai.com/docs/api-reference/completions/create
     */
    protected $temperature = 0.9;

    protected function fullUrl($uri)
    {
        return sprintf('%s/%s', $this->url, $uri);
    }

    public function client(): PendingRequest
    {
        $token = config('chatgpt.token');
        if (! $token) {
            throw new \Exception('No OpenAi Token');
        }

        return Http::retry(3)
            ->timeout(120)
            ->withHeaders(
                ['OpenAI-Organization' => 'org-ClL1biAi0m1pC2J2IV5C22TQ']
            )
            ->withToken($token);
    }

    protected function response(Response $response): ResponseDto|\Exception
    {
        if ($response->failed()) {
            logger($response->json());
            throw new \Exception('Error with response');
        }

        return new ResponseDto($response->json());
    }

    protected function fullBody(array $body): array
    {
        return array_merge(
            [
                'model' => $this->model,
                'temperature' => $this->temperature,
                'max_tokens' => $this->max_tokens,
            ],
            $body
        );
    }
}
