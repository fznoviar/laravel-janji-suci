<?php

namespace App\Modules\Guest\Group;

use App\Modules\Guest\Group\Contracts\GuestGroupInterface;
use App\Modules\Guest\Group\Contracts\GuestGroupRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GuestGroupRepository implements GuestGroupRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        return GuestGroupModel::all();
    }

    /**
     * @inheritDoc
     */
    public function ofIds(array $ids): Collection
    {
        return GuestGroupModel::query()->find($ids);
    }

    /**
     * @inheritDoc
     */
    public function ofId(int $id): ?GuestGroupInterface
    {
        return GuestGroupModel::query()->where('id', $id)->first();
    }

    /**
     * @inheritDoc
     */
    public function update(int $id, array $data): ?GuestGroupInterface
    {
        $model = GuestGroupModel::query()->find($id);

        if ($model) {
            $model->update($data);
        }

        return $model;
    }

    /**
     * @inheritDoc
     */
    public function add(GuestGroupInterface $model): void
    {
        return GuestGroupModel::create($model->toArray());
    }

    /**
     * @inheritDoc
     */
    public function remove(GuestGroupInterface $model): void
    {
        $model = GuestGroupModel::query()->find($model->getId());

        if ($model) {
            $model->delete();
        }
    }
}
