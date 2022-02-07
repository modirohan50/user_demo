<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::latest()->paginate(2);

        return view('user_list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        // dd($data);
        $user = new User();
        $request->validate([
            'fname' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'lname' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'email' => 'required',
            'profile' => 'required|image|mimes:jpg,jpeg,png',
            'hobby' => 'required',
            ]);
        if($request->profile){
            $fileName = time().'.'.$request->profile->extension();
             $request->profile->move(public_path('uploads'), $fileName);
            $user->profile = $fileName;
         }
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $hobbies =  $request->hobby;
        $hobbies =  implode(",", $hobbies);
        $user->hobby = $hobbies;
        $user->gender = $request->gender;
        $socialnames =  $request->social_name;
        $socialnames =  implode(",", $socialnames);
        $user->social_name = $socialnames;
        $sociallinks =  $request->social_link;
        $sociallinks =  implode(",", $sociallinks);
        $user->social_link = $sociallinks;
        $user->save();

        return redirect()->route('users.index')->with('success','User Created Successfully!');
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
        //
    }
}
