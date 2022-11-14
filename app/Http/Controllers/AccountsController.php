<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\SendSmsRequest;
use App\Models\Account;
use Illuminate\Http\JsonResponse;
use App\Services\AccountNotificationService;

class AccountsController extends Controller
{
    public function __construct(
        private readonly AccountNotificationService $accountNotificationService,
    )
    {
    }

    public function sendSms(Account $account, SendSmsRequest $request): JsonResponse
    {
        $this->accountNotificationService->activeSimCardsSendSms(
            $account,
            $request->input('text'),
        );

        return response()->json(['success' => true]);
    }
}
