<?php

namespace App\Http\Controllers;

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
            $path = $file->store('chat_files', 'public'); // ВАЖНО: 'public'
            \Log::info('File uploaded', ['path' => $path]); // логируем для проверки
            $message->files()->create([
                'path' => $path,
                'original_name' => $file->getClientOriginalName(),
            ]);
        }
    }

    return redirect()->back();
    }

    public function index(Chat $chat)
    {
        $messages = $chat->messages()->with('user', 'files')->orderBy('created_at')->get();
        return response()->json($messages);
    }
}