<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $listings = Listing::orderBy('created_at','desc')->get();
        return view('index')->with('listings',$listings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'      => ['required'],
            'address'   => ['required'],
            'website'   => ['required'],
            'email'     => ['required'],
            'phone'     => ['required'],
            'bio'       => ['required'],
        ]);

        $listings = new Listing();
        $listings->user_id = Auth::id();

        $listings->name     = $request->input('name');
        $listings->address  = $request->input('address');
        $listings->website  = $request->input('website');
        $listings->email    = $request->input('email');
        $listings->phone    = $request->input('phone');
        $listings->bio      = $request->input('bio');

        $listings->save();

        return redirect()->to('/home')->with('success','Listing created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listings = Listing::find($id);
        return view('show')->with('listings',$listings);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listings = Listing::find($id);
        return view('edit')->with('listings',$listings);
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
        $this->validate($request,[
            'name'      => ['required'],
            'address'   => ['required'],
            'website'   => ['required'],
            'email'     => ['required'],
            'phone'     => ['required'],
            'bio'       => ['required'],
        ]);

        $listings =Listing::find($id);
        $listings->name     = $request->input('name');
        $listings->address  = $request->input('address');
        $listings->website  = $request->input('website');
        $listings->email    = $request->input('email');
        $listings->phone    = $request->input('phone');
        $listings->bio      = $request->input('bio');

        $listings->save();

        return redirect()->to('/home')->with('success','Listing updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listings =Listing::find($id);
        $listings->delete();
        return redirect()->to('/home')->with('success','Listing delete successfully');

    }
}
