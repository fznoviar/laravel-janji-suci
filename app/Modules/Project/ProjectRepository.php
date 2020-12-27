<?php

namespace App\Modules\Project;

use App\Modules\Project\Contracts\ProjectInterface;
use App\Modules\Project\Contracts\ProjectRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository implements ProjectRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        return ProjectModel::all();
    }

    /**
     * @inheritDoc
     */
    public function ofIds(array $ids): Collection
    {
        return ProjectModel::query()->find($ids);
    }

    /**
     * @inheritDoc
     */
    public function ofId(int $id): ?ProjectInterface
    {
        return ProjectModel::query()->where('id', $id)->first();
    }
}
