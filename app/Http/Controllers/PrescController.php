<?php

namespace App\Http\Controllers;

use App\Presc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrescController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('prescriptions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function presclist()
    {
        $user = Auth::user();
        $prescs = Presc::where('user_id',$user->id)->get();
        return view('prescriptions.list')->with('prescs',$prescs)->with('user',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $this->validate($request,[
            'presc' => 'required|mimes:pdf,jpg,png,jpeg|max:1999'
        ]);

        $presc = $request->presc;
        $presc_new_name = time() . $presc->getClientOriginalName();
        $gallerypath = '/uploads/prescription/';
        $presc->move(public_path($gallerypath), $presc_new_name);

        Presc::create([
            'name' => $gallerypath . $presc_new_name,
        ]);

        return redirect()->back()->with('success','Prescription uploaded successfully..!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presc  $presc
     * @return \Illuminate\Http\Response
     */
    public function show(Presc $presc,$id)
    {
        $presc = Presc::find($id);
        return view('prescriptions.show')->with('presc', $presc);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presc  $presc
     * @return \Illuminate\Http\Response
     */
    public function edit(Presc $presc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Presc  $presc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presc $presc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presc  $presc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presc $presc)
    {
        //
    }
}
