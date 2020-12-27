<?php

namespace App\Modules\Event;

use App\Modules\Event\Contracts\EventInterface;
use App\Modules\Event\Contracts\EventRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EventRepository implements EventRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function all(): Collection
    {
        return EventModel::all();
    }

    /**
     * @inheritDoc
     */
    public function ofIds(array $ids): Collection
    {
        return EventModel::query()->find($ids);
    }

    /**
     * @inheritDoc
     */
    public function ofId(int $id): ?EventInterface
    {
        return EventModel::query()->firstWhere('id', $id);
    }

    /**
     * @inheritDoc
     */
    public function byProjectIdAll(int $projectId): Collection
    {
        return EventModel::query()->where(EventInterface::PROJECT_ID, $projectId)->get();
    }

    /**
     * @inheritDoc
     */
    public function byProjectIdOfId(int $projectId, int $id): ?EventInterface
    {
        return EventModel::query()->where(EventInterface::PROJECT_ID, $projectId)->firstWhere('id', $id);
    }
}
