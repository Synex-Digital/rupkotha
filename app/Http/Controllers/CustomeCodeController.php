<?php

namespace App\Http\Controllers;

use App\Models\CustomCode;
use Illuminate\Http\Request;

class CustomeCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $custom_code = CustomCode::first();
        return view('dashboard.custom_code.index',[
            'custom_code' => $custom_code
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $config = CustomCode::get();

        if($config->count() <  1){
            $new = new CustomCode();
            $new->header = $request->header;
            $new->footer = $request->footer;
            $new->save();
            return back()->with('success','Custome code created successfully');
        }
        else{
            $old = CustomCode::first();
            $old->header = $request->header;
            $old->footer = $request->footer;
            $old->save();
            return back()->with('success','Custom code updated successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
