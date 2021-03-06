<?php

namespace App\Http\Controllers;

use App\MyPage;
use Illuminate\Http\Request;
use App\Services\CheckUserData;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //ユーザーページの表示
        $user = MyPage::where('id', $id)->first();
        $role = CheckUserData::checkRole($user);
        return view('mypages.show',compact('user','role'));
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
        $user = MyPage::where('id', $id)->first();
        $role = CheckUserData::checkRole($user);
        return view('mypages.edit',compact('user','role'));
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
        $user = MyPage::where('id', $id)->first();
        $form = [
            'skill'=> $request->skill,
            'portfolio'=> $request->portfolio,
        ];
        $user->fill($form)->save();
        return redirect()->route('mypages.show',['id' => $user->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
