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

    public function show(Chat $chat)
    {
        return Inertia::render('Chat', [
            'chat' => $chat,
            'messages' => $chat->messages()->with('user', 'files')->orderBy('created_at')->get(),
        ]);
    }
}
