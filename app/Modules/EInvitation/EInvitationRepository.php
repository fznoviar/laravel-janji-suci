<?php

namespace App\Modules\EInvitation;

use App\Modules\EInvitation\Contracts\EInvitationInterface;
use App\Modules\EInvitation\Contracts\EInvitationRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EInvitationRepository implements EInvitationRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        return EInvitationModel::all();
    }

    /**
     * @inheritDoc
     */
    public function ofIds(array $ids): Collection
    {
        return EInvitationModel::query()->find($ids);
    }

    /**
     * @inheritDoc
     */
    public function ofId(int $id): ?EInvitationInterface
    {
        return EInvitationModel::query()->firstWhere('id', $id);
    }

    /**
     * @inheritDoc
     */
    public function byProjectIdAll(int $projectId): Collection
    {
        return EInvitationModel::query()->where(EInvitationInterface::PROJECT_ID, $projectId)->get();
    }

    /**
     * @inheritDoc
     */
    public function byProjectIdOfId(int $projectId, int $id): ?EInvitationInterface
    {
        return EInvitationModel::query()->where(EInvitationInterface::PROJECT_ID, $projectId)->firstWhere('id', $id);
    }
}
