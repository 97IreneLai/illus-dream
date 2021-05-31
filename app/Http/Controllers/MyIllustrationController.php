<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\MyIllustration;
use Symfony\Component\HttpFoundation\Response;

class MyIllustrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function saveIllus(Request $request){

        // $userId = auth('api')->user()->id;
        $userId = Auth::user()->id;
    
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
