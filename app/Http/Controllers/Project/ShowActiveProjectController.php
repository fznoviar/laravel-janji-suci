<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\Project\ProjectResource;
use App\Modules\Project\ProjectModel;

class ShowActiveProjectController extends Controller
{
    /**
     * @inheritDoc
     */
    public function __invoke()
    {
        return new ProjectResource(
            ProjectModel::first()
        );
    }
}
