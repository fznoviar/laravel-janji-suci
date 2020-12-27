<?php

namespace App\Modules\Project\Contracts;

interface HaveProjectInterface
{
    public const PROJECT_ID = 'project_id';

    /**
     * @return int
     */
    public function getProjectId(): int;

    /**
     * @return ProjectInterface
     */
    public function getProject(): ProjectInterface;

    /**
     * @param ProjectInterface $project
     *
     * @return $this
     */
    public function setProject(ProjectInterface $project): self;
}
