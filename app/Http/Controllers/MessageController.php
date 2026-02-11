<?php

namespace App\Http\Controllers;
use App\Events\NewMessage;
use Illuminate\Http\Request;
use App\Models\Chat;

class MessageController extends Controller
{
    public function store(Request $request, Chat $chat)
{
    $request->validate([
        'body' => 'required|string',
        'files.*' => 'file|max:10240',
    ]);

    $message = $chat->messages()->create([
        'user_id' => auth()->id(),
        'body' => $request->body,
    ]);

    // Сохраняем файлы
    if ($request->hasFile('files')) {
        foreach ($request->file('files') as $file) {
            $path = $file->store('chat_files', 'public');
            $message->files()->create([
                'path' => $path,
                'original_name' => $file->getClientOriginalName(),
            ]);
        }
    }

    // Обновим модель с файлами и пользователем для события
    $message->load('user', 'files');

    // Вещаем событие
    broadcast(new \App\Events\NewMessage($message))->toOthers();

    // Вернём сообщение в ответе (фронт может использовать)
    return response()->json($message);
}

    public function index(Chat $chat)
    {
        $messages = $chat->messages()->with('user', 'files')->orderBy('created_at')->get();
        return response()->json($messages);
    }
}