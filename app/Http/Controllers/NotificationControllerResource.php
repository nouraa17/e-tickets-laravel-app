<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationFormRequest;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\TicketResource;
use App\Models\Notification;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user()->id;
        $notifications = Notification::query()->where('user_id', $user)->get();
        $user_notifications = NotificationResource::collection($notifications);
        return view('notifications.index', ['notifications' => $user_notifications]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($userId)
    {
        $user = User::findOrFail($userId);
        return view('notifications.create-notification', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotificationFormRequest $request)
    {
        $data = $request->validated();
        Notification::query()->create($data);
        return redirect()->back()->with('success', 'Notification Sent Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $notification = Notification::query()->findOrFail($id);
        if((auth()->user()->id == $notification['user_id']) || (auth()->user()->type == 'admin')) {
            return view('notifications.details', ['notification'=>$notification]);
        }
        else{
            return redirect()->to('/notifications')->withErrors(['error' => 'Unauthorized action.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
