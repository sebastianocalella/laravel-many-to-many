<?php

namespace Database\Seeders;

use App\Models\Tecnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tecnologies = ['HTML5', 'CSS3', 'JS ES6', 'PHP', 'Vue 3', 'Laravel 9', 'Bootstrap 5', 'Vite', 'Composer', 'Node.js', 'SCSS', 'React', 'Angular.js', 'C', 'C++', 'Python'];

        foreach ($tecnologies as $tecnologyName) {
            $tecnology = new Tecnology();
            $tecnology->name = $tecnologyName;
            $tecnology->accent_color = $faker->unique()->hexColor();
            $tecnology->bg_color = $faker->unique()->hexColor();
            $tecnology->slug = Str::slug($tecnologyName);
            $tecnology->save();
            $tecnology->slug = $tecnology->slug . "-$tecnology->id";
            $tecnology->update();
        }
    }
}
