<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Khoahoc;
use Illuminate\Support\Facades\Auth;

class KHController extends Controller
{
    public function create(Request $request)
    {

        $user = Khoahoc::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'content' => $request->content,
        ]);

        return response()->json([
            'message' => 'Successfully created KH!'
        ], 200);
    }

    public function regit(Request $request)
    {

        $user = Khoahoc::create([
            'user_id' => Auth::user()->id,
            'khoahoc_id' => $request->khoahocId,
        ]);

        return response()->json([
            'message' => 'Successfully created KH!'
        ], 200);
    }
    
}
