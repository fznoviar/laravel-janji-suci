<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\Project\ProjectResource;
use App\Modules\Project\Contracts\ProjectInterface;
use App\Modules\Project\ProjectRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UpdateProjectSettingController extends Controller
{
    /**
     * @param Request $request
     * @param int     $id
     *
     * @return ProjectResource
     * @throws ValidationException
     */
    public function __invoke(Request $request, int $id)
    {
        $project = (new ProjectRepository())->ofId($id);
        $inputs = $this->validate(
            $request,
            [
                ProjectInterface::TITLE       => [
                    'required',
                ],
                ProjectInterface::URL         => [
                    'url',
                ],
                ProjectInterface::DESCRIPTION => [],
            ]
        );
        $project->setAttributes($inputs);
        $project->save();

        return new ProjectResource($project);
    }
}
