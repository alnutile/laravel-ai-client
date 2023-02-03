# Base client to talk to ChatBot amd Dall-e2 and Soon Other Services

[![Latest Version on Packagist](https://img.shields.io/packagist/v/alnutile/laravel-chatgpt.svg?style=flat-square)](https://packagist.org/packages/alnutile/laravel-chatgpt)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/alnutile/laravel-chatgpt/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/alnutile/laravel-chatgpt/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/alnutile/laravel-chatgpt/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/alnutile/laravel-chatgpt/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/alnutile/laravel-chatgpt.svg?style=flat-square)](https://packagist.org/packages/alnutile/laravel-chatgpt)

Going to build some basic Driver like clients to talk to different AI service but like with Laravel Storage it will treat them all the same.
 
  * ChatGPT for text
  * Jasper when ChatGPT is down :( 
  * Dall-2
  * OpenAI Moderator
  * Midjourney - when it gets an api

## Installation

You can install the package via composer:

```bash
composer require alnutile/laravel-chatgpt
```

You can then set your .env:

``` 
AI_CLIENT=sk-key
AI_MOCK=false
```

If you set AI_MOCK to true it will just return some fixture data
so if you are working in your UI for example it will just show 
that data.


## Usage

Here is an example of 
  * Call Moderation to see if the text is ok
  * TextClientFacade to do a text search with adding a prefix to the request
  * SearchResults Event to just let the system know and react to it like make a local copy of the data
  * ModerationFailed Event so you can react to that

```php
use Alnutile\LaravelChatgpt\Events\SearchResults;$moderationOk = ModerationClientFacade::checkOk(request()->search);
if ($moderationOk == false) {
    ModerationFailed::dispatch(request());
} else {
        $results = TextClientFacade::addPrefix('can you give me tl;dr terms of service for')->text($search);
        SearchResults::dispatch($results);
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Alfred Nutile](https://github.com/alnutile)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
