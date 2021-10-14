<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class ImageController extends Controller
{
    public function store(Request $request){
        $task = new Task();
        $task->id = 0;
        $task->exists = TRUE;
        $image = $task->addMediaFromRequest('upload')->toMediaCollection('images');

        return response()->json([
            'url' => $image->getUrl()
        ]);
    }
}
