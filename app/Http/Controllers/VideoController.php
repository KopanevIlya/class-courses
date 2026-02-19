<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Inertia\Inertia;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::orderBy('created_at', 'desc')->get();
        return Inertia::render('Videos', [
            'videos' => $videos
        ]);
    }
}