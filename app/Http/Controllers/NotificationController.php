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
            'notifications'=>auth()->user()->unreadNotifications()->paginate(12),
        ]);
    }



    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }

    public function markAsRead(DatabaseNotification $notification)
    {
        $notification->markAsRead();
        return redirect()->back();
    }

}
