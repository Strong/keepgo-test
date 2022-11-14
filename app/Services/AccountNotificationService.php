<?php
declare(strict_types=1);

namespace App\Services;

use App\Jobs\SendSmsJob;
use App\Models\Account;

final class AccountNotificationService
{
    public function activeSimCardsSendSms(Account $account, string $text): void
    {
        foreach ($account->activeSimCards as $simCard) {
            $textCompiled = __('Dear customer :name. ' . $text, [
                'name' => $account->name,
            ]);

            \Log::debug('Dispatch send sms job for account: '.$account->id.', phone: '.$simCard->phone);

            SendSmsJob::dispatch(
                $simCard->phone,
                $textCompiled,
            );
        }
    }
}
