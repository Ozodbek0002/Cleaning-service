<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller implements ShouldQueue
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('notifications.index',[
            'posts'=>Post::latest()->paginate(12),
            'notifications'=>auth()->user()->Notifications()->paginate(12),
        ]);
    }



    public function markAsRead(DatabaseNotification $notification)
    {
        $notification->markAsRead();
        return redirect()->back();
    }

}
