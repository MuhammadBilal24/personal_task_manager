<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Hash;
use Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function registration()
    {
        return view('registration');
    }
    public function newuser(request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12',
        ]);
        $user = new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= Hash::make($request->password);
        // here HASH SECURE OUR PASSWORD
        $res = $user->save();
        if($res)
        {
            return back()->with('success','You have registered successfully');
        }
        else{
            return back()->with('fail','oops, try again');
        }
        // echo 'posted';
        // return view('registration');
    }
    public function loginuser(request $request)
    {
        $request->validate([

            'email'=>'required|email',
            'password'=>'required|min:5|max:12',
        ]);
        $user = User::where('email','=', $request->email)->first();
        // return $user;
        if($user)
        {
            if(Hash::check($request->password, $user->password))
            {
                $request->session()->put('loginId','$user->id');
                return redirect('dashboard');
            }
            else
            {
                return back()->with('fail','The password is not matches.');
            }
        }
        else{
            return back()->with('fail','This email is not registered.');
        }
    }
    public function dashboard()
    {
        $data= array();
        if(Session::has('loginId'))
        {
            $data = User::where('id','=', Session::has('loginId'))->first();
        }
        // return $data;
        $myworkdata = DB::table('myworks')->where(['status'=>'1'])->get();
        $remainworkdata = DB::table('remainwork')->get();
        $mynotepaddata = DB::table('notepad')->get();
        $noticeboard = DB::table('notepad')->where(['id_note'=>'1'])->get();
        $workingtasks = DB:: table('remainwork')
        ->join('myworks', 'myworks.id_work', '=', 'remainwork.id_work')
        ->where(['remainwork.status_remain'=>'1'])
        ->get();
        $onaccounts= DB::table('socialaccounts')->where(['status_sac'=>'1'])->get();
        $activeaccounts= DB::table('socialaccounts')->where(['status_sac'=>'3'])->get();
        $activeprojects= DB::table('projects')->where(['status_proj'=>'1'])->get();
        return view('dashboard',  ['myworkdata' => $myworkdata, 'remainworkdata'=>$remainworkdata,'mynotepaddata'=>$mynotepaddata,
                                        'workingtasks'=>$workingtasks,'activeaccounts'=>$activeaccounts,'onaccounts'=>$onaccounts, 'activeprojects'=>$activeprojects, 'data'=>$data
                                            ,'noticeboard'=>$noticeboard]);
    }
    public function logoutuser()
    {
        if(Session::has('loginId'))
        {
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
