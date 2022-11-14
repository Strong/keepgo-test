<?php

namespace App\Services\SmsProvider;

interface SmsProviderInterface
{
    public function send(string $phone, string $text): bool;
}
