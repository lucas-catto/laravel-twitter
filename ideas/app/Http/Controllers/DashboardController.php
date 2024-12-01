<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $idea = new Idea([
            'content' => 'test',
            'likes' => rand(0, 9)
        ]);
        
        $idea->save();
        
        $ideas = Idea::orderBy('created_at', 'DESC')->paginate(5);

        return view('dashboard', compact('ideas'));
    }
}
