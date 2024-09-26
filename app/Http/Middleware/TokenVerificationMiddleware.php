<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $token=$request->cookie('token');
        $result=JWTToken::VerifyToken($token);
        if($result=="unauthorized"){
            return redirect('/userLogin');
        }
        else{

            if(($request->is('cars')  || $request->is( 'rentals') ) || $result->userType=="admin"){
           // if($result->userType=="admin"){
                $request->headers->set('userType',"admin");
                $request->headers->set('email',$result->userEmail);
                  $request->headers->set('id',$result->userID);
              return $next($request);
                  // return redirect('/dashboard');
                // return $next($request);
            }
            else{
                $request->headers->set('userType',"customer");
            
            $request->headers->set('email',$result->userEmail);
            $request->headers->set('id',$result->userID);
            // $request->headers->set('college_code',$result->collegeCode);
            // $request->headers->set('college_name',$result->collegeName);
            return $next($request);
            }
        }


    }
}
