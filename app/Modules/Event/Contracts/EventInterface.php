<?php

namespace App\Modules\Event\Contracts;

use App\Foundation\ModelTrait\HaveTimestampModelTraitInterface;
use App\Modules\Project\Contracts\HaveProjectInterface;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;

interface EventInterface extends Arrayable, HaveTimestampModelTraitInterface, HaveProjectInterface
{
    public const TITLE = 'title';

    public const DESCRIPTION = 'description';

    public const START_AT = 'start_at';

    public const END_AT = 'end_at';

    public const LONGITUDE = 'longitude';

    public const LATITUDE = 'latitude';

    public const LOCATION = 'location';

    public const CITY = 'city';

    public const ADDRESS = 'address';

    public const IS_PRIMARY = 'is_primary';

    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @return null|string
     */
    public function getDescription(): ?string;

    /**
     * @return null|Carbon
     */
    public function getStartAt(): ?Carbon;

    /**
     * @return null|Carbon
     */
    public function getEndAt(): ?Carbon;

    /**
     * @return null|string
     */
    public function getLongitude(): ?string;

    /**
     * @return null|string
     */
    public function getLatitude(): ?string;

    /**
     * @return null|string
     */
    public function getLocation(): ?string;

    /**
     * @return null|string
     */
    public function getCity(): ?string;

    /**
     * @return string
     */
    public function getAddress(): string;

    /**
     * @return bool
     */
    public function isPrimary(): bool;
}
