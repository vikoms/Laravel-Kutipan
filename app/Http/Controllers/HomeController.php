<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
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
        return view('home');
    }

    public function profile($id = null)
    {

        if($id == null) {
            $user = User::findOrFail(Auth::user()->id);
        } else {
            $user = User::findOrFail($id);
        }
        return view('profile',['user'=>$user]);
    }

    public function get_notif()
    {

        $user = Auth::user();
        $notifications = Notification::where('user_id',$user->id)->orderBy('id','desc')->get();
        $notif_model = new Notification;
        return view('notification',compact('notifications','notif_model','user'));
    }
}
