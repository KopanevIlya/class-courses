<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Chat;

// app/Http/Controllers/ChatController.php
class ChatController extends Controller
{
    // Список чатов
    public function index()
    {
        $chats = auth()->user()->chats()->get();
        return Inertia::render('Chats', [
            'chats' => $chats,
        ]);
    }

    // Конкретный чат
    public function show(Chat $chat)
    {
        // $this->authorize('view', $chat); // если нужна политика
        $messages = $chat->messages()->with('user', 'files')->get();
        return Inertia::render('Chat', [ // <--- ВАЖНО! ДРУГОЙ КОМПОНЕНТ
            'chat' => $chat,
            'messages' => $messages,
        ]);
    }
}
