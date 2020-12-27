<?php

namespace App\Modules\Guest\Group\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface GuestGroupRepositoryInterface
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
     * @return null|GuestGroupInterface
     */
    public function ofId(int $id): ?GuestGroupInterface;

    /**
     * @param int   $id
     * @param array $data
     *
     * @return null|GuestGroupInterface
     */
    public function update(int $id, array $data): ?GuestGroupInterface;

    /**
     * @param GuestGroupInterface $model
     */
    public function add(GuestGroupInterface $model): void;

    /**
     * @param GuestGroupInterface $model
     */
    public function remove(GuestGroupInterface $model): void;
}
