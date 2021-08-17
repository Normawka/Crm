<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            ['name'=>'New'],
            ['name'=>'In progress'],
            ['name'=> 'Done']
        ];
        foreach ($param as $item){
            TaskStatus::create($item);
        }
    }
}
