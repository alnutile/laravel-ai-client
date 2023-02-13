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

    protected $context = null;

    protected $stop = [];

    /*
     * @see https://beta.openai.com/docs/api-reference/completions/create
     */
    protected $temperature = 0.9;

    public function setTemperature($amount): LaravelChatgpt
    {
        $this->temperature = $amount;

        return $this;
    }

    public function setContext(string $context): LaravelChatgpt
    {
        $this->context = $context;

        return $this;
    }

    public function setStop(array $stop): LaravelChatgpt
    {
        $this->stop[] = $stop;

        return $this;
    }

    public function setMaxTokens($amount): LaravelChatgpt
    {
        $this->max_tokens = $amount;

        return $this;
    }

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
        $fullBody = array_merge(
            [
                'model' => $this->model,
                'temperature' => $this->temperature,
                'max_tokens' => $this->max_tokens,
            ],
            $body
        );

        if (! empty($this->stop)) {
            $fullBody['stop'] = $this->stop;
        }

        if ($this->context) {
            $fullBody['context'] = $this->context;
        }

        return $fullBody;
    }
}
