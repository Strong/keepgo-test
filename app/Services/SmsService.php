<?php
declare(strict_types=1);

namespace App\Services;

use App\Services\SmsProvider\SmsProviderInterface;

final class SmsService
{
    public function __construct(
        private readonly SmsProviderInterface $smsProvider,
    )
    {
    }

    public function send(string $phone, string $text): bool
    {
        return $this->smsProvider->send($phone, $text);
    }
}
