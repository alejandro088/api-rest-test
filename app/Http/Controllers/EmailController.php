<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    public function checkEmail(Request $request)
    {

        if(!isset($request->email)){
            return ["result" => null];
        }
            

        $validator = Validator::make($request->all(), [
            'email' => 'email:rfc,dns'
        ]);
        
        if ($validator->fails()) {
            return ["result" => false];
        }

        return ["result" => true];
    }
}
