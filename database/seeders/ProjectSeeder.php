<?php

namespace Database\Seeders;

use App\Modules\Project\Contracts\ProjectInterface;
use App\Modules\Project\ProjectModel;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectModel::create(
            [
                ProjectInterface::TITLE     => 'A & F',
                ProjectInterface::MAX_GUEST => 200,
            ]
        );
    }
}
