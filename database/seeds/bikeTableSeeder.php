<?php

use Illuminate\Database\Seeder;
use App\Bike;

class bikeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bike = new Bike();
        $bike->name = 'cannondale';
        $bike->DriveTrain = 'DriveTrain';
        $bike->Brakes = 'Brakes';
        $bike->Crank = 'Crank';
        $bike->Wheelset = 'Wheelset';
        $bike->imageLink = 'imageLink';
        $bike->extras = 'extras'; 
        $bike->save();

    }
}
