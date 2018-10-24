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
        $bike->description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ex velit, convallis eget metus vitae, tincidunt maximus turpis. ";
        $bike->DriveTrain = 'DriveTrain';
        $bike->Brakes = 'Brakes';
        $bike->Crank = 'Crank';
        $bike->Wheelset = 'Wheelset';
        $bike->imageLink = 'imageLink';
        $bike->extras = 'extras'; 
        $bike->availability = '3'; 
        $bike->save();

    }
}
