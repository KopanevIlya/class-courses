<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;

class NewMessage implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct($message)
    {
        // Загрузи пользователя и файлы сразу, чтобы всё пришло на фронт
        $this->message = $message->load('user', 'files');
    }

    public function broadcastOn()
    {
        // Приватный канал для чата
        return new PrivateChannel('chat.' . $this->message->chat_id);
    }
}