<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => ['required', 'min:3', 'max:240']
        ]);
        
        $validated['user_id'] = Auth::user()->id;

        Idea::create($validated);

        return redirect()->route('dashboard.index')->with('success', 'Idea created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        return view('ideas/show', compact('idea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        if (Auth::user()->id !== $idea->user_id)
        {
            abort(403);
        }

        $editing = true;
        return view('ideas/show', compact('idea', 'editing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idea $idea)
    {
        if (Auth::user()->id !== $idea->user_id)
        {
            abort(403);
        }

        $validated = $request->validate([
            'content' => ['required', 'min:3', 'max:240']
        ]);

        $idea->update($validated);

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated Successfully!');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        if (Auth::user()->id !== $idea->user_id)
        {
            abort(403);
        }

        $idea->delete();

        return redirect()->route('dashboard.index')->with('success', 'Idea deleted Successfully!');
    }
}
