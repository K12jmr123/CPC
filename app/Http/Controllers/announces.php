<?php

namespace App\Http\Controllers;

use App\Models\individual;
use App\Models\User;
use App\Models\announce;
use App\Models\bin;
use Illuminate\Http\Request;

class announces extends Controller
{


    public function index()
    {
        $users = User::all();

        foreach ($users as $user) {
            $existingAnnounce = announce::where('Firstname', $user->Firstname)
                ->where('Lastname', $user->Lastname)
                ->where('Section', $user->Section)
                ->where('Role', $user->Role)
                ->first();

            if (!$existingAnnounce) {
                $announce = new announce();
                $announce->Firstname = $user->Firstname;
                $announce->Lastname = $user->Lastname;
                $announce->Section = $user->Section;
                $announce->Role = $user->Role;
                $announce->message = "null";
                $announce->sender = "null";
                $announce->save();
            }
        }

        return view('Announcement', compact('users'));
    }

    public function announceUser(Request $request)
    {
        $users = announce::all();

        foreach ($users as $user) {
            $user->sender = $request->input('sender');
            $user->message = $request->input('message');
            $user->save();
            $anotherTableEntry = new bin;
            $anotherTableEntry->sender = $user->sender;
            $anotherTableEntry->message = $user->message;
            $anotherTableEntry->date = now();
            $anotherTableEntry->save();
        }
        return "success";
    }
    public function announceindividual(Request $request)
    {
        $id = $request->input('id');

        // Retrieve the resource by ID
        $resource = announce::findOrFail($id);
        $resource->sender = $request->sender;
        $resource->message = $request->message;
        $resource->save();
        $anotherTableEntry = new individual;
        $anotherTableEntry->userid = $resource->id;
        $anotherTableEntry->sender = $resource->sender;
        $anotherTableEntry->message = $resource->message;
        $anotherTableEntry->date = now();
        $anotherTableEntry->save();


    }
    public function requestevent(Request $request)
    {
        return $request;

    }
    public function getevent(Request $request)
    {
        $id = $request->input('Section');
        $data = announce::where('section', $id)->get();

        return view('event', ['data' => $data]);
    }


}