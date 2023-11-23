<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Violation_report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()&&Auth::user()->role == 0){

            $report= Violation_report::select('post_id')
            ->with('post.user')
            ->selectRaw('COUNT(post_id) as count_postid')
            ->groupBy('post_id')
            ->orderBy('count_postid', 'desc')        
            ->take(20)
            ->whereHas('post', function ($query) {
                $query->where('del_flg', 0);
            })
            ->get();
            

            
            return view('manager/manager_post',[
                'reports'=>$report,
            ]);
        }else{
            return view('error');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()&&Auth::user()->role == 0){
            
            $report= Violation_report::where('post_id',$id)->with('user')->get()->toArray();
            
            return view('manager/manager_post_comment',[
                'reports'=>$report,
            ]);
        }else{
            return view('error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
            $post = Post::find($id);
            $post ->del_flg = 1 ;
            $post->save();
            return redirect('/manager_post');
        }else{
            return view('error');
        }
    }
}
