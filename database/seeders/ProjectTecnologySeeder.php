<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Tecnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectTecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $projects = Project::all();

        $tecnologyIds = Tecnology::all()->pluck('id');

        foreach ($projects as $project) {
            $project->tecnologies()->attach($faker->randomElements($tecnologyIds, 5));
        }
    }
}
