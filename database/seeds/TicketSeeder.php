<?php

use App\Department;
use App\Priority;
use App\State;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Priority::truncate();
        Department::truncate();
        State::truncate();
        $priority = [
            0   =>  'high',
            1   =>  'low',
            2   =>  'medium',
        ];
        foreach ($priority as $value){
            Priority::create([
                'name'  =>  $value,
                'active'    =>  0,
            ]);
        }

        $department = [
            0   =>  'technical',
            1   =>  'financial',
            2   =>  'support',
        ];
        foreach ($department as $value){
            Department::create([
                'name'  =>  $value,
                'active'    =>  0,
            ]);
        }

        $state = [
            0   =>  'Open',
            1   =>  'Closed',
            2   =>  'Inprocess',
            3   =>  'Waitforanswer',
            4   =>  'Answered',
        ];
        foreach ($state as $states){
            State::create([
                'name'  =>  $states,
                'active'    =>  1,
            ]);
        }
    }
}
