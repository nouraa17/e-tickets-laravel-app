<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;
use App\Models\Ticket;
use Illuminate\Http\Request;

class CommentControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentFormRequest $request)
    {
        $data = $request->validated();
//        dd($data);
        if((auth()->user()->id == $data['user_id']) || (auth()->user()->type == 'admin')) {
            Comment::query()->create($data);
            return redirect()->back();
        }
        else{
            return redirect()->to('/tickets')->with('error', 'Unauthorized action.');
        }
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

    public function showTicketComments(string $ticketId)
    {
        $ticket = Ticket::where('id', $ticketId)->first();
        $comments = Comment::with('user')->where('ticket_id', $ticketId)->get();
        if((auth()->user()->id == $ticket['user_id']) || (auth()->user()->type == 'admin')) {
            return view('tickets.details', ['ticket'=>$ticket,'comments' => $comments]);
        }
        else{
            return redirect()->to('/tickets')->withErrors(['error' => 'Unauthorized action.']);
        }
    }

}
