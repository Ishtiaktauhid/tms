<?php
 namespace App\Http\Middleware;
 use Closure;
 use App\Models\User; //custom
 use Illuminate\Http\Request;
 use Session;

 class isAdmin 
 {
    

    public function handle(Request $request, Closure  $next){
        if(!session::has('userId') || Session::has('userId')==null || !session::has('roleIdentity')){
            return redirect()->route('logOut');
        }
        else{
            $user=User::findOrFail(currentUserId());
            app()->setLocale($user->language); // language
            if(!$user){
                return redirect()->route('logOut');
            }
            else if(currentUser() != 'admin'){
                return redirect()->back()->with('danger','Access Denied');
            }
            else{
                return $next($request);
            }
        }
        return redirect()->route('logOut');
    }
 }
 