<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\SocialAccount;

use Auth;
use App\Models\User;

class SocilateController extends Controller
{

    ////  login with Facebook

    public function redirect($google){

        return Socialite::driver($google)->redirect();

    }

    public function callback($google){


        //return $userSocialite->email;
        try {
            //$token = Socialite::driver($service)->token;


            $userSocialite = Socialite::driver($google)->stateless()->user();
            $finduser = User::where('email', $userSocialite->email)->first();

            $token = $userSocialite->token;
            $refreshToken = $userSocialite->refreshToken;
            $expiresIn = $userSocialite->expiresIn;
            $token = $userSocialite->token;


            if($finduser){



                Auth::login($finduser);
                return redirect()->route('welcome');
            }else{

                $createUser = User::create([
                    'name' => $userSocialite->name,
                    'email' => $userSocialite->email,
                    'password' =>bcrypt('12345')

                ]);

                Auth::login($createUser);
                return redirect()->route('welcome');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }


    }



}
