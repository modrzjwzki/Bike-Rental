<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (auth::user()->name == "admin") {
            $bike = DB::table('bike')->get();
            $rentedBikes = DB::table('rented_bikes')->get();
            
            return view('Pages.adminPanel', 
            ['bikes' => $bike,
            'rentedBikes' => $rentedBikes
            ]);
        } else {
            return redirect('/');
        }
       
       
        
    }

    public function status($id, $status){
        if (auth::user()->name == "admin") {
            DB::table('rented_bikes')->where('id', $id)->update(['STATUS' => $status]);
            return redirect('admin');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $bikeRented = DB::table('bike')->insert(
            [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'name' => $request->input('Name'),
                'description' => $request->input('description'),
                'DriveTrain' => $request->input('DriveTrain'),
                'Wheelset' => $request->input('Wheelset'),
                'Brakes' => $request->input('Brakes'),
                'Crank' => $request->input('Crank'),
                'imageLink' => $request->input('imageLink'),
                'availability' => $request->input('availability'),
                'Extras' => '',

            ]
        );
        
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth::user()->name == "admin") {
            DB::table('bike')->where('id', $id)->delete();
            return redirect('admin');
        }
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
        
    }
}
