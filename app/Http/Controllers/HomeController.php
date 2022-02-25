<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //$personalacc = new User;
        return view('home', ['data' => User::where('id', '=', Auth::id()) -> get()]); //view data of registered user

    }

    public function edit(){

        $id = new User;

        
        return view('home-update', ['data' => User::where('id', '=', Auth::id()) -> get()]);
    }

    public function update(Request $request){
        $user = Auth::user();
        if ($user){
            if (Auth::user() -> email === $request['email']) {
                $validate = $request->validate([
                    'surname' => ['required', 'string', 'max:255'],
                    'name' => ['required', 'string', 'max:255'],
                    'midname' => ['required', 'string', 'max:255'],
                    'passportdata' => ['required', 'string', 'min:12', 'max:12'],
                    'email' => ['required', 'string', 'email', 'max:255'],
                    

            ]);
            } else{
                $validate = $request->validate([
                    'surname' => ['required', 'string', 'max:255'],
                    'name' => ['required', 'string', 'max:255'],
                    'midname' => ['required', 'string', 'max:255'],
                    'passportdata' => ['required', 'string', 'min:12', 'max:12'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    
            ]);


            }

            
            $user -> surname = $request['surname'];
            $user -> name = $request['name'];
            $user -> midname = $request['midname'];
            $user -> passportdata = $request['passportdata'];
            $user -> email = $request['email'];
            

            $user -> save();
            return redirect('/home');
        } else{
            return redirect()->back();
        }
    }

}
