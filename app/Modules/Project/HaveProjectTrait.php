<?php

namespace App\Modules\Project;

use App\Modules\Project\Contracts\HaveProjectInterface;
use App\Modules\Project\Contracts\ProjectInterface;

trait HaveProjectTrait
{
    public function project()
    {
        return $this->belongsTo(ProjectModel::class, HaveProjectInterface::PROJECT_ID);
    }

    /**
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->{HaveProjectInterface::PROJECT_ID};
    }

    /**
     * @return ProjectInterface
     */
    public function getProject(): ProjectInterface
    {
        return $this->project;
    }


    /**
     * @param ProjectInterface $project
     *
     * @return $this
     */
    public function setProject(ProjectInterface $project): self
    {
        $this->project()->associate($project);

        return $this;
    }
}
