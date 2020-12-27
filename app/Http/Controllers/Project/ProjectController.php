<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\Project\ProjectCollection;
use App\Http\Resources\Project\ProjectResource;
use App\Modules\Project\Contracts\ProjectRepositoryInterface;
use App\Modules\Project\Handler\CreateWeddingProject;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectController extends Controller
{
    /**
     * @param ProjectRepositoryInterface $repository
     *
     * @return ProjectCollection
     */
    public function index(ProjectRepositoryInterface $repository)
    {
        return new ProjectCollection($repository->all());
    }

    /**
     * @param Request              $request
     * @param CreateWeddingProject $createWeddingProject
     *
     * @return ProjectResource
     */
    public function store(Request $request, CreateWeddingProject $createWeddingProject)
    {
        $project = $createWeddingProject->handle($request);

        return new ProjectResource($project);
    }

    /**
     * @param                            $id
     * @param ProjectRepositoryInterface $repository
     *
     * @return ProjectResource
     */
    public function show($id, ProjectRepositoryInterface $repository)
    {
        return new ProjectResource($repository->ofId($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
