<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\Violation_report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // 昇順
        // if(Auth::check()&&Auth::user()->role == 0){
            $report= 
            Post::select('del_flg','user_id')
            ->with('user')
            ->selectRaw('COUNT(del_flg) as count_flg')
            ->where('del_flg','1')
            ->groupBy('user_id', 'del_flg')
            ->orderBy('count_flg', 'desc')
            ->take(10)
            ->whereHas('user', function ($query) {
                $query->where('del_flg', 0);
            })
            ->get()
            ->toArray();
            return view('manager/manager_user',[
                'reports'=>$report,
            ]);
        // }else{
            // return view('error');
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check()&&Auth::user()->role == 0){
            $user =User::find($id);
            $user ->del_flg = 1 ;
            $user->save();
            return redirect('/manager_user');
        }else{
            return view('error');
        }
    }
}
