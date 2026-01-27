<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// app/Http/Controllers/MessageController.php
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

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('chat_files');
                $message->files()->create([
                    'path' => $path,
                    'original_name' => $file->getClientOriginalName(),
                ]);
            }
        }

        broadcast(new \App\Events\NewMessage($message))->toOthers();

        return response()->json($message->load('user', 'files'));
    }
}
