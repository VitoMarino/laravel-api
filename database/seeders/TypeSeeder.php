<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use function PHPSTORM_META\type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //
        $typesName = [
            'HYBRID',
            'FRONT-END',
            'BACK-END',
        ];

        foreach ($typesName as $typeName) {
            $type = new Type();

            $type->name = $typeName;
            $type->color = $faker->unique()->safehexColor();
            $type->save();
        }
    }
}
