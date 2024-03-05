<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;
use App\Models\User; 

class APISingerController extends Controller
{
    public function getSingerContent(Request $request)
    {
        $singer = User::find($request->id);

        $songs = $singer->songs()->get();
        $publications = Publication::where('uid', $request->id)->get();

        return response()->json([
            'songs' => $songs,
            'publications' => $publications
        ]);
    }
}

