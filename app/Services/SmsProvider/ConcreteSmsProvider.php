<?php
declare(strict_types=1);

namespace App\Services\SmsProvider;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;

final class ConcreteSmsProvider implements SmsProviderInterface
{
    public function __construct(private readonly ClientInterface $client)
    {
    }

    /**
     * @throws ClientExceptionInterface
     * @throws \JsonException
     */
    public function send(string $phone, string $text): bool
    {
        // TODO: Implement concrete sms provider send sms logic here.

//        $request = new Request('POST', 'https://concrete-sms.localhost');
//
//        $response = $this->client->sendRequest($request);
//        $responseDecoded = json_decode(
//            $response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR
//        );
//
//        if (isset($responseDecoded['error'])) {
//            return false;
//        }

        return true;
    }
}
