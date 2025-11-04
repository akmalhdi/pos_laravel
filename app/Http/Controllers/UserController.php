<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Users";
        $datas = User::orderBy('id', 'DESC')->get();
        return view('user.index', compact("datas", "title"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Users";
        return view('user.create', compact("title"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        alert()->success('Success', 'Insert Success');
        try {
            $request->validate([
                'email' => 'required|email|unique:users,email',
                'name' => 'required',
                'password' => 'nullable'
            ]);

            \App\Models\User::create(
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]
                );
                return redirect()->to('user');
        } catch (\Illuminate\Validation\ValidationException $th) {
            return redirect()->back()->withErrors($th->validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Edit User";
        $user = User::find($id);
        return view('user.edit', compact('user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        alert()->success('Success', 'Update Success');
        $user = \App\Models\User::find($id);
        try {
            $request->validate([
                'email' => 'required|email',
                'name' => 'required',
                'password' => 'nullable'
            ]);

            $data = [
                "name" => $request->name,
                "email" => $request->email,
            ];

            if($request->filled('password')){
                $data['password'] = Hash::make($request->password);
            }
            $user->update($data);

            return redirect()->route('user.index');
        } catch (\Illuminate\Validation\ValidationException $th) {
            return redirect()->back()->withErrors($th->validator)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=User::find($id);
        $data->delete();
        alert()->success('Success', 'Delete Success');
        return redirect()->route("user.index");
    }
}
