<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\record;

class recordController extends Controller
{
    public function sectionRecord(Request $request)
    {

        $id = $request->input('Section');
        $users = record::where('section', $id)->get();

        return view('records', ['users' => $users]);


    }
    public function individualpay(Request $request)
    {
        $id = $request->input('id');
        $resource = record::findOrFail($id);

        $resource->status = "paid";
        $resource->save();
        return "updated successfully";


    }
    public function docreatepayment(Request $request)
    {


        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $section = $request->input('section');
        $Students = record::create([
            'Firstname' => $fname,
            'Lastname' => $lname,
            'Section' => $section,
            'status' => 'paid',


        ]);
        return $request;


    }
    public function edit(Request $request)
    {
        $id = $request->input('id');
        $users = record::where('id', $id)->get();
        return response()->json(['message' => $users], 200);

    }
    public function edits(Request $request)
    {
        $id = $request->input('id');
        $users = record::where('id', $id)->get();
        return response()->json(['message' => $users], 200);

    }

    public function paymentTest(Request $request)
    {
        $id = $request->input('id');
        $resource = record::findOrFail($id);

        $resource->status = "paid";
        $resource->save();
        return $resource;


    }


    public function updates(Request $request)
    {
        $id = $request->input('id');
        $resource = record::findOrFail($id);

        $resource->Firstname = $request->fname;
        $resource->Lastname = $request->lname;
        $resource->Section = $request->section;

        $resource->save();
        return "updated successfully";

    }

    public function Displaysection()
    {
        $data = record::take(10)->get();
        return view('recordsall', ['data' => $data]);
    }
    public function DisplayBysection(Request $request)
    {
        $id = $request->input('Section');
        $data = record::where('section', $id)->get();

        return view('displalyRecords', ['data' => $data]);

    }
    public function destroy(Request $request)
    {
        //
        $id = $request->input('id');

        $resource = record::findOrFail($id);
        $resource->delete();
        return "succesfully deleted";
    }

    public function getusertest(Request $request)
    {

        return $request;


    }

}