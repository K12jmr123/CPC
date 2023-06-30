<?php

namespace App\Http\Controllers;

use App\Models\announce;
use App\Models\payment;
use Illuminate\Http\Request;

class paymentcontroller extends Controller
{
    private $users;
    public function paymentpost(Request $request)
    {
        $users = announce::all();

        foreach ($users as $user) {
            $sections = $user->Section;
            $id = $user->id;
            $user->sender = $request->input('sender');
            $user->message = $request->input('message');
            $user->save();
            $anotherTableEntry = new payment;
            $anotherTableEntry->userid = $id;
            $anotherTableEntry->sender = $user->sender;
            $anotherTableEntry->message = $user->message;
            $anotherTableEntry->amount = $request->input('amount');
            $anotherTableEntry->section = $sections;
            $anotherTableEntry->date = now();
            $anotherTableEntry->save();
        }
        return "succesfully";

    }

    public function index(Request $request)
    {
        return view('Mayors');
    }
    public function getPaymentUser(Request $request)
    {
        $id = $request->input('section');
        $users = payment::where('section', $id)->get();





    }
    public function doPaymentUser(Request $request)
    {

        $id = $request->input('Section');
        $users = payment::where('section', $id)->get();

        return view('paymentpost', ['users' => $users]);


    }

    public function getusertest(Request $request)
    {
        $id = $request->input('id');
        $resource = payment::findOrFail($id);

        $resource->status = "paid";
        $resource->save();
        return "updated successfully";


    }
    public function OriginalTest(Request $request)
    {
        $id = $request->input('id');
        $resource = payment::findOrFail($id);

        $resource->status = "paid";
        $resource->save();
        return $resource;


    }
    public function edit(Request $request)
    {
        $id = $request->input('id');
        $users = payment::where('id', $id)->get();
        return response()->json(['message' => $users], 200);

    }

    public function editpayment(Request $request)
    {
        $id = $request->input('id');
        $users = payment::where('id', $id)->get();
        return response()->json(['message' => $users], 200);

    }

    public function updates(Request $request)
    {
        $id = $request->input('id');
        $resource = payment::findOrFail($id);

        $resource->sender = $request->sender;
        $resource->amount = $request->amount;
        $resource->message = $request->message;

        $resource->save();
        return "updated successfully";


    }
    public function Displaysection()
    {
        $data = payment::all();
        return view('transaction', ['data' => $data]);

    }
    public function destroy(Request $request)
    {
        //
        $id = $request->input('id');

        $resource = payment::findOrFail($id);
        $resource->delete();
        return "succesfully deleted";
    }


}