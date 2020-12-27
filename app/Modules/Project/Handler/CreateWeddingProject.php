<?php

namespace App\Modules\Project\Handler;

use App\Modules\Project\ProjectModel;
use Illuminate\Http\Request;

class CreateWeddingProject
{
    /**
     * @param Request $request
     *
     * @return ProjectModel
     */
    public function handle(Request $request)
    {
        $validatedData = $this->validate($request);

        return $this->createProject($validatedData);
    }

    /**
     * @param array $inputs
     *
     * @return ProjectModel
     */
    private function createProject(array $inputs): ProjectModel
    {
        $project = ProjectModel::create($inputs);

        return $project;
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    private function validate(Request $request): array
    {
        return $request->validate(
            [
                'title' => [
                    'required',
                ],
            ]
        );
    }
}
