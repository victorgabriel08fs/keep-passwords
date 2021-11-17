<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user_id = auth()->user()->id;
        $passwords = Password::where('user_id', $user_id)->paginate(10);
        return view('password.index', ['passwords' => $passwords]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('password.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        Password::create([
            'name' => $request->input('name'),
            'user_name' => $request->input('user_name'),
            'password' => Crypt::encrypt($request->input('password')),
            'user_id' => $user_id
        ]);
        return redirect()->route('password.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Password $password)
    {
        return view('password.show', ['password' => $password]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Password $password)
    {
        return view('password.edit', ['password' => $password]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Password $password)
    {
        if (!$password->user_id == auth()->user()->id) {
            return view('acesso-negado');
        }
        $password->update([
            'name' => $request->input('name'),
            'user_name' => $request->input('user_name'),
            'password' => Crypt::encrypt($request->input('password')),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Password $password)
    {
        if (!$password->user_id == auth()->user()->id) {
            return view('acesso-negado');
        }

        $password->delete();
        return redirect()->route('password.index');
    }
}
