<?php

namespace App\Modules\Guest\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface GuestRepositoryInterface
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
     * @param string $id
     *
     * @return null|GuestInterface
     */
    public function ofId(string $id): ?GuestInterface;
}
