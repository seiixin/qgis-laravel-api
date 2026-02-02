<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\AudioFile;
use App\Models\Video;

class MediaController extends Controller {
    public function audio() { return AudioFile::all(); }
    public function videos() { return Video::all(); }
}
