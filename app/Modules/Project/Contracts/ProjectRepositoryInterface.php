<?php

namespace App\Modules\Project\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface ProjectRepositoryInterface
{
    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param int[] $ids
     *
     * @return Collection
     */
    public function ofIds(array $ids): Collection;

    /**
     * @param int $id
     *
     * @return null|ProjectInterface
     */
    public function ofId(int $id): ?ProjectInterface;
}
