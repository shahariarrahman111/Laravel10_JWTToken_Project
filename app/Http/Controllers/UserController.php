<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;


class UserController extends Controller
{

    // User Registration function with try catch *********
    
    function userRegistration (Request $request)
    {
       try {

        User::create($request->input());

       return response()->json([
        "status"=> "success",
        "message"=> "User Register Successfuly"
       ],200);

       }
       catch (Exception $e) {

        return response()->json([
            "status"=> "failed",
            "message"=> "User Registration Failed"
        ],200);
       }

    }

    //  User Login function with condition,query, and JWTToken***********

    function userLogin (Request $request) 
    {
        $count = User::where("email", "=",  $request->input("email"))
            ->where("password", "=", $request->input("password"))
            ->count();


            if ($count == 1){
                // User Login -> JWT Token Issue
                
                $token =JWTToken::CreateToken($request->input("email"));
                return response()->json([
                    "status"=> "success",
                    "message"=> "User Login Successfull",
                    "token" =>$token
                ],200);
            }else{
                return response()->json([
                    "status"=> "failed",
                    "message"=> "User Login Failed"
                ],200);
            }

    }
}
