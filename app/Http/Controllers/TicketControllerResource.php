<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketFormRequest;
use App\Http\Resources\TicketResource;
use App\Models\Comment;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        $user = auth()->user()->id;
        if (auth()->user()->type === 'admin'){
            $tickets = Ticket::all();
        }
        else{
            $tickets = Ticket::query()->where('user_id', $user)->get();
        }
        $user_tickets = TicketResource::collection($tickets);
        return view('tickets.index', ['tickets' => $user_tickets]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create-ticket');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketFormRequest $request)
    {
        $data = $request->validated();
        Ticket::query()->create($data);
        return redirect()->back()->with('success', 'Ticket Sent Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
