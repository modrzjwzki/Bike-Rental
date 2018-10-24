<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
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
        $availability = DB::table('bike')->where('id', ''.$request->input('Bike_id').'')->first();
        if ($availability->availability > 0){
            $request->validate([
                'Bike_Name' => 'required',
                'Bike_id' => 'required',
                'WhoRented' => 'required',
                'publish_at' => 'nullable|date'
            ]);

            
            $bikeRented = DB::table('rented_bikes')->insert(
                [
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'whoRented' => $request->input('WhoRented'),
                    'whatBike' => $request->input('Bike_id'),
                    'whenRented' => date('Y-m-d'),
                    'bikeName' => $request->input('Bike_Name'),
                    'status' => 'dostępny',
                    'whenEnd' => date('Y-m-d', strtotime('+7 days'))
                ]
            );
    
            $bike = DB::table('bike')->where('id', ''.$request->input('Bike_id').'')->first();
            
            DB::table('bike')
                ->where('id', $request->input('Bike_id'))
                ->update(['availability' => $bike->availability -1]);

            return view('Pages.rent');
        } else {
            return 'Rower niedostępny';
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $query = DB::table('bike')->where('id', ''.$id.'')->exists();
        $bike = DB::table('bike')->where('id', ''.$id.'')->first();
        
        if ($query == true) {
            return view('Pages.bike', [
                'id' => $bike->id,
                'name' => $bike->name,
                'description' => $bike->description,
                'DriveTrain' => $bike->DriveTrain,
                'Brakes' => $bike->Brakes,
                'Crank' => $bike->Crank,
                'Wheelset' => $bike->Wheelset,
                'imageLink' => $bike->imageLink,
                'availability' => $bike->availability,
            ]);
        }
        /*

        if(is_null($bike)){
           
        }
        */
        
        
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
        //
    }
}
