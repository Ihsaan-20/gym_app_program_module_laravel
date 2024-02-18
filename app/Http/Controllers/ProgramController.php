<?php

namespace App\Http\Controllers;

use App\Models\Sets;
use App\Models\Programs;
use App\Models\Workouts;
use App\Models\Exercises;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{

    public function index()
    {

        $program = [
            'auth_id' => 1,
            'name' => 'Program 1',
            'coach_id' => '2',
            'assigned_clients' => '55',
            'description' => 'Program description 1',
        ];
        $program = Programs::create($program);
        $lastProgramId = $program->id;
        $workouts = [
            0 => [
                'program_id' => $lastProgramId,
                'name' => 'Workout 1',
                'description' => 'workout description 1',
            ],
            1 => [
                'program_id' => $lastProgramId,
                'name' => 'Workout 2',
                'description' => 'workout description 2',
            ]
        ];

        
        $sets = [
            0 => [
                'workout_id' => $lastProgramId,
                'name' => 'Sets 1',
                'description' => 'Sets description 1',
            ],
            1 => [
                'workout_id' => $lastProgramId,
                'name' => 'Sets 2',
                'description' => 'Sets description 2',
            ]
        ];

        $exercises = [
            0 => [
                'set_id' => $lastProgramId,
                'name' => 'Exercises 1',
                'description' => 'Exercises description 1',
            ],
            1 => [
                'set_id' => $lastProgramId,
                'name' => 'Exercises 2',
                'description' => 'Exercises description 2',
            ]
        ];

        foreach($workouts as $w)
        {
            $wk = Workouts::create([
                'program_id' => $lastProgramId,
                'name' => $w['name'],
                'description' => $w['description'],
            ]);
            $wk->id;
            foreach($sets as $s)
            {
                $st = Sets::create([
                    'workout_id' => $wk->id,
                    'name' => $s['name'],
                    'description' => $s['description'],
                ]);
                $st->id;
                foreach($exercises as $e)
                {
                    Exercises::create([
                        'set_id' => $st->id,
                        'name' => $e['name'],
                        'description' => $e['description'],
                    ]);
                }

            }
        }

        return "done";
    }

    public function show()
    {
    //     $programs = DB::table('programs')
        // ->leftJoin('workouts', 'programs.id', '=', 'workouts.program_id')
        // ->leftJoin('sets', 'workouts.id', '=', 'sets.workout_id')
        // ->leftJoin('exercises', 'sets.id', '=', 'exercises.set_id')
        // ->get();



    $program = Programs::with('workouts.sets.exercises')->find(1);
    dd([
        'program' =>  $program,

    ]);

    foreach ($program->workouts as $workout) {
        // Access workout and related data
        foreach ($workout->sets as $set) {
            // Access set and related data
            foreach ($set->exercises as $exercise) {
                // Access exercise data
            }
        }
    }





    

    }
}
