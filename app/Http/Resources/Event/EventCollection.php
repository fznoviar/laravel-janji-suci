<?php

namespace App\Http\Resources\Event;

use App\Http\Resources\GenericCollection;

class EventCollection extends GenericCollection
{
    public $collects = EventResource::class;
}
