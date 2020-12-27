<?php

namespace App\Modules\Guest;

use App\Modules\Guest\Contracts\GuestInterface;
use App\Modules\Guest\Contracts\GuestRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GuestRepository implements GuestRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        return GuestModel::all();
    }

    /**
     * @inheritDoc
     */
    public function ofIds(array $ids): Collection
    {
        return GuestModel::query()->find($ids);
    }

    /**
     * @inheritDoc
     */
    public function ofId(string $id): ?GuestInterface
    {
        return GuestModel::query()->first();
    }
}
