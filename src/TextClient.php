<?php

namespace Alnutile\LaravelChatgpt;

use Alnutile\LaravelChatgpt\Contracts\TextClientContract;
use Alnutile\LaravelChatgpt\DTOs\ResponseDto;

class TextClient extends LaravelChatgpt implements TextClientContract
{
    protected $model = 'text-davinci-003';

    protected $prexif = null;

    public function addPrefix($prefix): TextClientContract
    {
        $this->prexif = $prefix;

        return $this;
    }

    public function text($phrase): ResponseDto|\Exception
    {
        if ($this->prexif) {
            $phrase = sprintf('%s %s', $this->prexif, $phrase);
        }

        $body = [
            'prompt' => $phrase,
        ];

        logger('This is the body', $body);

        $response = $this->client()
            ->post(
                $this->fullUrl('completions'),
                $this->fullBody($body)
            );

        $response = $this->response($response);

        $response->search_term = str($phrase)->title()->toString();

        return $response;
    }
}
