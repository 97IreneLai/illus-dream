<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\MyIllustration;
use Symfony\Component\HttpFoundation\Response;

class MyIllustrationController extends Controller
{
    public function saveIllus(Request $request){

        $userId = Auth::user()->id;
        // $userId = auth('api')->user()->id;
        // $userId = 1;
        // dd($userId);
        // $userId = null;

        $illus = new MyIllustration();
        $illus->user_id = $userId;
        $illus->name = $request->input('name');
        // $illus->illustration_svg = $request->input('illustration_svg');
        $illus->illustration_svg = serialize($request->input('illustration_svg'));
        $illus->save();

        // return $this->success();
        return response()->json([
            'success' => true
        ], Response::HTTP_OK);
    }
}
