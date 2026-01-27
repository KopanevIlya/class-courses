<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Chat;

// app/Http/Controllers/ChatController.php
class ChatController extends Controller
{
    public function index()
    {
        $chats = auth()->user()->chats()->get();
        return Inertia::render('Chats', [
            'chats' => $chats,
        ]);
    }
    public function show(Chat $chat)
    {
        $this->authorize('view', $chat); // если используешь политики
        $messages = $chat->messages()->with('user', 'files')->get();
        return Inertia::render('Chat', [
            'chat' => $chat,
            'messages' => $messages,
        ]);
    }
}
