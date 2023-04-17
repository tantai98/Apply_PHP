<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User_Detail;
use Illuminate\Http\Request;

class UserDetailController extends Controller
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
    public function create(Request $request)
    {
        $request = $request->all();
        
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
     * @param  \App\User_Detail  $user_Detail
     * @return \Illuminate\Http\Response
     */
    public function show(User_Detail $user_Detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User_Detail  $user_Detail
     * @return \Illuminate\Http\Response
     */
    public function edit(User_Detail $user_Detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User_Detail  $user_Detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_Detail $user_Detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User_Detail  $user_Detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_Detail $user_Detail)
    {
        //
    }
}
