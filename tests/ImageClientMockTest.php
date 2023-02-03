<?php

namespace Alnutile\LaravelChatgpt\Tests;

use Alnutile\LaravelChatgpt\DTOs\ImageResponseDto;
use Alnutile\LaravelChatgpt\DTOs\ImagesResponseDto;
use Alnutile\LaravelChatgpt\ImageClientMock;
use Illuminate\Support\Facades\File;

class ImageClientMockTest extends TestCase
{
    public function test_mock()
    {
        $data = <<<'EOD'
{
    "created": 1674065330,
    "data": [
        {
            "url": "https://oaidalleapiprodscus.blob.core.windows.net/private/org-ClL1biAi0m1pC2J2IV5C22TQ/user-i08oJb4T3Lhnsh2yJsoErWJ4/img-5CGVUOpH2HsRdB7zVWeJSufj.png?st=2023-01-18T17%3A08%3A50Z&se=2023-01-18T19%3A08%3A50Z&sp=r&sv=2021-08-06&sr=b&rscd=inline&rsct=image/png&skoid=6aaadede-4fb3-4698-a8f6-684d7786b067&sktid=a48cca56-e6da-484e-a814-9c849652bcb3&skt=2023-01-18T15%3A37%3A27Z&ske=2023-01-19T15%3A37%3A27Z&sks=b&skv=2021-08-06&sig=1guBf9z2zX%2BUNiBGs7IT61YmKcmv7%2BHKL1zHxzNKcQc%3D"
        },
        {
            "url": "https://oaidalleapiprodscus.blob.core.windows.net/private/org-ClL1biAi0m1pC2J2IV5C22TQ/user-i08oJb4T3Lhnsh2yJsoErWJ4/img-GkcQxoVIH1BWlml3uMJjxlNt.png?st=2023-01-18T17%3A08%3A50Z&se=2023-01-18T19%3A08%3A50Z&sp=r&sv=2021-08-06&sr=b&rscd=inline&rsct=image/png&skoid=6aaadede-4fb3-4698-a8f6-684d7786b067&sktid=a48cca56-e6da-484e-a814-9c849652bcb3&skt=2023-01-18T15%3A37%3A27Z&ske=2023-01-19T15%3A37%3A27Z&sks=b&skv=2021-08-06&sig=o9wlRNNJZW4GPBJo74gKn%2BXX8WSq47DL9QSf/agD9Ws%3D"
        }
    ]
}
EOD;

        File::shouldReceive('get')->andReturn($data);

        $results = (new ImageClientMock())->images('foo');

        $this->assertInstanceOf(ImagesResponseDto::class, $results);
        $this->assertInstanceOf(ImageResponseDto::class,
            $results->images[0]);
    }
}
