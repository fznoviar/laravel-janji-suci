<?php

namespace App\Modules\Event\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface EventRepositoryInterface
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
     * @return null|EventInterface
     */
    public function ofId(int $id): ?EventInterface;

    /**
     * @return Collection
     */
    public function byProjectIdAll(int $projectId): Collection;

    /**
     * @param int $projectId
     * @param int $id
     *
     * @return null|EventInterface
     */
    public function byProjectIdOfId(int $projectId, int $id): ?EventInterface;
}
