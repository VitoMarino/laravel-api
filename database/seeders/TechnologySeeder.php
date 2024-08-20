<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologiesData = [
            [
                "name" => 'HTML-CSS',
                'color' => '#F54291'
            ],
            [
                "name" => 'JavaScript',
                'color' => '#4260f5'
            ],
            [
                "name" => 'Bootsrap',
                'color' => "#42A5F5"
            ],
            [
                "name" => 'VUE JS',
                'color' => "#D32F2F"
            ],
            [
                "name" => 'PHP',
                'color' => "#3254a8"
            ],
            [
                "name" => 'Laravel',
                'color' => "#0288D1"
            ]
        ];

        foreach ($technologiesData as $technologyData) {
            Technology::create($technologyData);
        }
    }
}
