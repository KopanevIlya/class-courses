<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::routes();

Broadcast::channel('chat.{chatId}', function ($user, $chatId) {
    // Проверяем, состоит ли пользователь в этом чате
    return $user->chats()->where('id', $chatId)->exists();
});