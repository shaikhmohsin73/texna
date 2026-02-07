<?php

use Illuminate\Support\Facades\Http;

if (!function_exists('sendTelegramMessage')) {
    function sendTelegramMessage($message)
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');
        if (!$token || !$chatId) {
            return false;
        }
        Http::get("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'HTML',
        ]);
    }
}
