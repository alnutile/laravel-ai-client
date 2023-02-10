<?php

namespace Alnutile\LaravelChatgpt;

use Alnutile\LaravelChatgpt\Contracts\TextClientContract;
use Alnutile\LaravelChatgpt\DTOs\ResponseDto;

class TextClientMock extends TextClient
{
    protected $prexif = null;


    public function text($phrase): ResponseDto|\Exception
    {
        if (! app()->environment('testing')) {
            sleep(5);
        }

        if ($this->prexif) {
            $phrase = sprintf('%s %s', $this->prexif, $phrase);
        }

        $mockResponse = <<<'EOD'
The Gmail Terms of Service outlines the rules for using Gmail, a free email service provided by Google. It covers topics such as acceptable use, content ownership, user privacy, and the use of cookies and other technologies. The agreement also explains the rights and responsibilities of both the user and Google with regards to the use of the service. In summary, the Gmail Terms of Service sets out the expectations for using the email service, including what users can expect from Google in terms of privacy and security of their data.

EOD;

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
