<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoAccessController extends Controller
{
    // Назначить одно видео одному пользователю
    public function assign(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'video_id' => 'required|exists:videos,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $video = Video::findOrFail($request->video_id);

        // Назначить видео пользователю (не будет дублей)
        $user->videos()->syncWithoutDetaching([$video->id]);

        return redirect()->back()->with('success', 'Видео назначено пользователю!');
    }

    // Если нужно массово назначить несколько видео
    public function assignMany(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'video_ids' => 'required|array',
            'video_ids.*' => 'exists:videos,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->videos()->syncWithoutDetaching($request->video_ids);

        return redirect()->back()->with('success', 'Видео назначены пользователю!');
    }
}
