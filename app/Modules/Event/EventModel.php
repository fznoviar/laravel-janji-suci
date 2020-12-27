<?php

namespace App\Modules\Event;

use App\Foundation\ModelTrait\HaveTimestampModelTrait;
use App\Modules\Event\Contracts\EventInterface;
use App\Modules\Project\HaveProjectTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EventModel extends Model implements EventInterface
{
    use HaveTimestampModelTrait;
    use HaveProjectTrait;

    protected $table = 'events';

    protected $fillable = [
        self::TITLE,
        self::DESCRIPTION,
        self::START_AT,
        self::END_AT,
        self::LONGITUDE,
        self::LATITUDE,
        self::LOCATION,
        self::CITY,
        self::ADDRESS,
        self::IS_PRIMARY,
    ];

    protected $casts = [
        self::IS_PRIMARY => 'bool',
        self::START_AT   => 'datetime',
        self::END_AT     => 'datetime',
        self::PROJECT_ID => 'int',
    ];

    /**
     * @inheritDoc
     */
    public function getTitle(): string
    {
        return $this->{self::TITLE};
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): ?string
    {
        return $this->{self::DESCRIPTION};
    }

    /**
     * @inheritDoc
     */
    public function getStartAt(): ?Carbon
    {
        return $this->{self::START_AT};
    }

    /**
     * @inheritDoc
     */
    public function getEndAt(): ?Carbon
    {
        return $this->{self::END_AT};
    }

    /**
     * @inheritDoc
     */
    public function getLongitude(): ?string
    {
        return $this->{self::LOCATION};
    }

    /**
     * @inheritDoc
     */
    public function getLatitude(): ?string
    {
        return $this->{self::LATITUDE};
    }

    /**
     * @inheritDoc
     */
    public function getLocation(): ?string
    {
        return $this->{self::LOCATION};
    }

    /**
     * @inheritDoc
     */
    public function getCity(): ?string
    {
        return $this->{self::CITY};
    }

    /**
     * @inheritDoc
     */
    public function getAddress(): string
    {
        return $this->{self::ADDRESS};
    }

    /**
     * @inheritDoc
     */
    public function isPrimary(): bool
    {
        return $this->{self::IS_PRIMARY};
    }
}
