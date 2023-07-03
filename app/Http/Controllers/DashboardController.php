<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function loginpage()
    {
         return view ('login');
    }
    public function index()
    {
        $myworkdata = DB::table('myworks')->get();
        $remainworkdata = DB::table('remainwork')->get();
        $mynotepaddata = DB::table('notepad')->get();
        $workingtasks = DB:: table('remainwork')
        ->join('myworks', 'myworks.id_work', '=', 'remainwork.id_work')
        ->where(['remainwork.status_remain'=>'1'])
        ->get();
        $activeaccounts= DB::table('socialaccounts')->where(['status_sac'=>'1'])->get();
        $activeprojects= DB::table('projects')->where(['status_proj'=>'1'])->get();
        return view('dashboard',  ['myworkdata' => $myworkdata,'remainworkdata'=>$remainworkdata,'mynotepaddata'=>$mynotepaddata,
                                        'workingtasks'=>$workingtasks,'activeaccounts'=>$activeaccounts, 'activeprojects'=>$activeprojects]);
    }
    public function getworks()
    {
        $myworkdata = DB::table('myworks')->get();
        // return $myworkdata;
        return view('works',  ['myworkdata' => $myworkdata]);
    } 
    public function insertwork(Request $request) 
    {
        $data=[
            'title'=>$request->input('title'),
            'subject'=>$request->input('subject'),
            'desc'=>$request->input('desc'),
            'status'=>$request->input('status'),
            ];
           DB::table('myworks')->insert($data);
           return redirect('/works');
    }
    // Get Edit using Api
    public function getworkdata(request $request)
    {
        $data= DB::table('myworks')->where(['id_work'=>$request->id_work])->get();   
        return $data;
    }
    // Update Works
    public function updatework(Request $request)
    {
        $data=[
            'id_work'=> $request->input('id_work'),
            'title'=>$request->input('title'),
            'subject'=>$request->input('subject'),
            'desc'=>$request->input('desc'),
            'status'=>$request->input('status'),
        ];
        DB::table('myworks')->where(['id_work'=>$request->id_work])->update($data);
        return redirect('/works');
    }
    // Delete Works using Api
    public function deleteworkdata(request $request)
    {
        $data= DB::table('myworks')->where(['id_work'=>$request->id_work])->delete();   
        return $data;
    }
    // RemainWorks
    public function remainworks(request $request)
    {   
        $workdata= DB::table('myworks')->where(['id_work'=>$request->workID])->get();
        $remainworkdata = DB::table('myworks')
        ->join('remainwork', 'remainwork.id_work', '=', 'myworks.id_work')
        ->where(['myworks.id_work'=>$request->workID])
        ->get();
        // return $workdata;
        return view('remainworks',['remainworkdata'=>$remainworkdata, 'workdata'=>$workdata]);
    }
    // Insert Remain Works
    public function insertremainworks(request $request)
    {
        $data=[
            'id_work'=> $request->input('id_work'),
            'task'=> $request->input('task'),
            'reason'=> $request->input('reason'),
            'status_remain'=> $request->input('status_remain'),
        ];
        DB::table('remainwork')->insert($data);
        return back();
    } 
    // get data for edit RemainWorks
    public function getremainworkdata(request $request)
    {
        $data= DB::table('remainwork')->where(['id_remain'=>$request->id_remain])->get();
        return $data;
    }
    // Update RemainWorks
    public function updateremainworks(request $request)
    {
        $data=[
            'id_work'=>$request->input('id_work'),
            'id_remain'=>$request->input('id_remain'),
            'task'=>$request->input('task'),
            'reason'=>$request->input('reason'),
            'status_remain'=>$request->input('status_remain'),
        ];
        DB::table('remainwork')->where(['id_remain'=>$request->id_remain])->update($data);
        return back();
    } 
    // Delete RemainWorks using Api
    public function deleteremainwork(request $request)
    {
        $data= DB::table('remainwork')->where(['id_remain'=>$request->id_remain])->delete();
        return $data;
    }

    
    // Projects
    public function projectpage()
    {
        $projectdata=DB::table('projects')->get();
        return view('projects',['projectdata'=>$projectdata]);
    }
    public function insertproject(request $request)
    {
        $data=[
            'title_proj'=>$request->input('title_proj'),
            'subject_proj'=>$request->input('subject_proj'),
            'language_proj'=>$request->input('language_proj'),
            'desc_proj'=>$request->input('desc_proj'),
            'status_proj'=>$request->input('status_proj'),
        ];
        DB::table('projects')->insert($data);
        return redirect('projects');
    }
    public function getprojectdata(request $request)
    {
        $data= DB::table('projects')->where(['id_proj'=>$request->id_proj])->get();
        return $data;
    }
    public function updateproject(request $request)
    {
        $data=[
            'id_proj'=>$request->input('id_proj'),
            'title_proj'=>$request->input('title_proj'),
            'subject_proj'=>$request->input('subject_proj'),
            'language_proj'=>$request->input('language_proj'),
            'desc_proj'=>$request->input('desc_proj'),
            'status_proj'=>$request->input('status_proj'),
        ];
        DB:: table('projects')->where(['id_proj'=>$request->id_proj])->update($data);
        return redirect('projects');
    }
    public function deleteproject(request $request)
    {
        $data = DB::table('projects')->where(['id_proj'=>$request->id_proj])->delete();
        return $data;
    }

    // Project Details
    public function projectdetails(request $request)
    {
        $projectdata= DB:: table('projects')->where(['projects.id_proj'=>$request->projectID])->get();
        $projectdetailsdata= DB:: table('projectdetails')->get();
        // return $projectdata;
        return view('projectdetails',['projectdata'=>$projectdata, 'projectdetailsdata'=>$projectdetailsdata]);
    }
    public function insertprojectdetails(request $request)
    {
        $data=[
            'id_proj'=>$request->input('id_proj'),
            'tasks_detproj'=>$request->input('tasks_detproj'),
            'status_detproj'=>$request->input('status_detproj'),
        ];
        DB::table('projectdetails')->insert($data);
        return back();
    }
    public function getprojectdetails(request $request)
    {
        $data= DB:: table('projectdetails')->where(['id_detproj'=>$request->id_detproj])->get();
        return $data;
    }
    public function updateprojectdetails(request $request)
    {
        $data=[
            'id_detproj'=>$request->input('id_detproj'),
            'id_proj'=>$request->input('id_proj'),
            'tasks_detproj'=>$request->input('tasks_detproj'),
            'status_detproj'=>$request->input('status_detproj'),
        ];
        DB::table('projectdetails')->where(['id_detproj'=>$request->id_detproj])->update($data);
        return back();
    }
    public function socialaccounts()
    {
        $myaccountsdata = DB::table('socialaccounts')->get();
        return view('accounts',['myaccountsdata'=>$myaccountsdata]);
    }
    public function insertaccount(request $request)
    {
        $data=[
            'title_sac'=>$request->input('title_sac'),
            'email_sac'=>$request->input('email_sac'),
            'password_sac'=>$request->input('password_sac'),
            'link_sac'=>$request->input('link_sac'),
            'status_sac'=>$request->input('status_sac'),
        ];
        DB::table('socialaccounts')->insert($data);
        return back();
    }
    public function getsocialaccountdata(request $request)
    {
        $data =DB::table('socialaccounts')->where(['id_sac'=>$request->id_sac])->get();
        return $data;
    }
    public function updatesocialaccounts(request $request)
    {
        $data=[
            'id_sac'=>$request->input('id_sac'),
            'title_sac'=>$request->input('title_sac'),
            'email_sac'=>$request->input('email_sac'),
            'password_sac'=>$request->input('password_sac'),
            'link_sac'=>$request->input('link_sac'),
            'status_sac'=>$request->input('status_sac'),
        ];
        DB::table('socialaccounts')->where(['id_sac'=>$request->id_sac])->update($data);
        return back();
    } 
    public function notepad()
    {
        $mynotepaddata= DB::table('notepad')->get();
        return view('notepad',['mynotepaddata'=>$mynotepaddata]);
    }
    public function insertnotepad(request $request)
    {
        $data=[
            'title_note'=>$request->input('title_note'),
            'details_note'=>$request->input('details_note'),
            'status_note'=>$request->input('status_note'),
        ];
        DB::table('notepad')->insert($data);
        return redirect('/notepad');
    }
    public function getnotepad(request $request)
    {
        $data= DB::table('notepad')->where(['id_note'=>$request->id_note])->get();
        return $data;
    }
    public function updatenotepad(request $request)
    {
        $data=[
            'id_note'=>$request->input('id_note'),
            'title_note'=>$request->input('title_note'),
            'details_note'=>$request->input('details_note'),
            'status_note'=>$request->input('status_note'),
        ];
        DB::table('notepad')->where(['id_note'=>$request->id_note])->update($data);
        return back();
    }
    public function deletenotepad(request $request)
    {
        $data= DB::table('notepad')->where(['id_note'=>$request->id_note])->delete();
        return $data;
    }
    public function users()
    {
        $usersdata=DB::table('users')->get();
        return view('users',['usersdata'=>$usersdata]);
    }
    public function getprofile()
    {
        return view('profile');
    }
}