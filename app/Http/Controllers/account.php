<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class account extends Controller
{
    public function addstudents(Request $request)
    {

        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $section = $request->input('section');
        $password = $request->input('password');
        $email = $request->input('email');
        $Students = User::create([
            'Firstname' => $fname,
            'Lastname' => $lname,
            'Section' => $section,
            'Role' => 'users',
            'email' => $email,
            'password' => $password

        ]);
        return $request;

    }
    public function getloginUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $role = $user->Role;

            if ($role == 'users') {
                // return view('StudentOfficer', ['user' => $user]);

                return view('Mayors', compact('user'));



            }
        }


    }
    public function officerdashboard(Request $request)
    {
        $user = Auth::user();
        return view('Mayors', compact('user'));
    }
    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $role = $user->Role;

            if ($role == 'users') {
                // return view('StudentOfficer', ['user' => $user]);

                //    return response()->json(['message' => $user], 200);

                return "201";

            } else {


                //return view('admin');
                //to_route('displayaccount');
                return "200";
            }

        }



    }
    public function displayaccount()
    {
        $data = User::all();
        //return ['timeout' => [$data->toArray()]];
        return view('admin', compact('data'));


    }
    public function edit(Request $request)
    {
        $id = $request->input('id');
        $users = User::where('id', $id)->get();
        return response()->json(['message' => $users], 200);

    }
    public function updateinfo(Request $request)
    {
        $id = $request->input('id');
        $resource = User::findOrFail($id);

        $resource->Firstname = $request->fname;
        $resource->Lastname = $request->lname;
        $resource->Section = $request->section;
        $resource->email = $request->email;
        $resource->save();
        return "updated successfully";

    }
    public function destroy(Request $request)
    {
        //
        $id = $request->input('id');

        $resource = User::findOrFail($id);
        $resource->delete();
        return "succesfully deleted";
    }
    public function promoteUser(Request $request)
    {
        $id = $request->input('id');
        $resource = User::findOrFail($id);

        $resource->Role = "SSG";

        $resource->save();
        return "updated successfully";

    }

}