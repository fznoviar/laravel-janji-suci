<?php

namespace App\Modules\EInvitation\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface EInvitationRepositoryInterface
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
     * @return null|EInvitationInterface
     */
    public function ofId(int $id): ?EInvitationInterface;

    /**
     * @param int $projectId
     *
     * @return Collection
     */
    public function byProjectIdAll(int $projectId): Collection;

    /**
     * @param int $projectId
     * @param int $id
     *
     * @return null|EInvitationInterface
     */
    public function byProjectIdOfId(int $projectId, int $id): ?EInvitationInterface;
}
