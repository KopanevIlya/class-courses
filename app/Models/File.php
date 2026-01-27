<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/File.php
class File extends Model
{
    protected $fillable = ['message_id', 'path', 'original_name'];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
