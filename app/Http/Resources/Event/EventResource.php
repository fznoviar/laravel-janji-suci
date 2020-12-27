<?php

namespace App\Http\Resources\Event;

use App\Modules\Event\Contracts\EventInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * @return EventInterface
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @inheritDoc
     */
    public function toArray($request)
    {
        $startAt = $this->getResource()->getStartAt();
        $endAt = $this->getResource()->getEndAt();

        return [
            'title'       => $this->getResource()->getTitle(),
            'description' => $this->getResource()->getDescription(),
            'start_at'    => $startAt ? $startAt->toDateTimeString() : null,
            'end_at'      => $endAt ? $endAt->toDateTimeString() : null,
            'longitude'   => $this->getResource()->getLongitude(),
            'latitude'    => $this->getResource()->getLatitude(),
            'location'    => $this->getResource()->getLocation(),
            'city'        => $this->getResource()->getCity(),
            'address'     => $this->getResource()->getAddress(),
            'is_primary'  => $this->getResource()->isPrimary(),
        ];
    }
}
