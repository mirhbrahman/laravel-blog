<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Session;

class UsersController extends Controller
{
    public function __construct()
	{
		$this->middleware('admin');
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input =  $request->all();
        $this->validate($request,[
            'name'=>'required|min:2|max:199',
            'email'=>'required|email|unique:users',
        ]);
        //.........default password for user
        $input['password'] = bcrypt('password');
        //.........default profile for user
        if ($user = User::create($input)) {
            $profile = Profile::create([
                'user_id' => $user->id,
                'avater' => 'uploads/avaters/default.png',
            ]);

            Session::flash('success','User added successfully.');
        }

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $user = User::find($id);
        if ($user->delete()) {
            Session::flash('success','User deleted.');
        }
        return redirect()->route('user.index');
    }

    public function admin($id)
    {
        $user = User::find($id);
        $user->admin = 1;
        if ($user->save()) {
            Session::flash('success','Successfully changed user permission.');
        }
        return redirect()->back();
    }

    public function not_admin($id)
    {
        $user = User::find($id);
        $user->admin = 0;
        if ($user->save()) {
            Session::flash('success','Successfully changed user permission.');
        }
        return redirect()->back();
    }
}
