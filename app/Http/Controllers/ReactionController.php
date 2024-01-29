<?php

namespace App\Http\Controllers;
use App\Models\Reaction;
use Illuminate\Http\Request;
use App\Http\Resources\ReactionResource;

class ReactionController extends Controller
{
    //
    public function index()
    {
        $reactions = Reaction::all();
        return response($reactions,200);
    }

    public function show($reactionId)
    {
        $reaction = Reaction::findOrFail($reactionId);
        return  response($reaction,200);
    }

    public function store(Request $request)
    {
            
    }

    public function update(Request $request, $reactionId)
    {
        $reaction = Reaction::findOrFail($reactionId);
        $reaction->update($request->all());

        return new ReactionResource($reaction);
    }

    public function destroy($reactionId)
    {
        $reaction = Reaction::findOrFail($reactionId);
        $reaction->delete();

        return response()->json(null, 204);
    }
}
