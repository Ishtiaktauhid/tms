<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role; //custom
use App\Models\User; //custom
use App\Http\Requests\Authentication\SignupRequest;
use App\Http\Requests\Authentication\SigninRequest;
use Illuminate\Support\Facades\Hash; //for hash
use Exception;

class AuthenticationController extends Controller
{
    public function signUpForm(){
        return view('backend.authentication.signup');
    }
    
    public function signUpStore(SignupRequest $request){
        try{
            $user= new User;
            $user->name_en=$request->FullName;
            $user->contact_no_en=$request->contact_no_en;
            $user->email=$request->EmailAddress;
            $user->password=Hash::make($request->password);
            $user->role_id=2;
            // dd($request->all());
            if($user->save())
                return redirect('signin')->with('success','Successfully Registred');
            else
                return redirect('signin')->with('danger','Please try again');
        }
        catch(Exception $e){
            //  dd($e);
            return redirect('signin')->with('danger','Please try again');
        }
    }
    public function signInForm(){
        return view('backend.authentication.signin');
    }

    public function signInCheck(SigninRequest $request){
        try{
            $fieldType =filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'contact_no_en';
            $user=User::where($fieldType, $request->username)->first();
            if($user){
                if(Hash::check($request->password, $user->password )){
                    $this->setSession($user);
                    return redirect()->route('dashboard')->with('success','Successfully login');
                }else
                    return redirect()->route('signin')->with('error','Your phone number or password is wrong1!');
            }else
                 return redirect()->route('signin')->with('error', 'Invalid ' . $fieldType . '! Please Try Again');
        }catch(Exception $e){
            // dd($e);
            return redirect()->route('signin')->with('error', 'Invalid ' . $fieldType . '! Please Try Again');
        }
    }
    public function setSession($user){
        return request()->session()->put([
            'userId'=>encryptor('encrypt',$user->id),
            'userName'=>encryptor('encrypt',$user->name_en),
            'role_id'=>encryptor('encrypt', $user->role_id),
           'accessType'=>encryptor('encrypt', $user->full_access),
            'role'=>encryptor('encrypt',$user->role->type),
            'roleIdentity'=>encryptor('encrypt',$user->role->identity),
            'language'=>encryptor('encrypt',$user->language),
            'image'=>$user->image ?? 'no-image.png'
        ]);
    }
    public function signOut(){
        request()->session()->flush();
        return redirect('signin')->with('error','Successfully logged Out');
    }
}
