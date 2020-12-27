<?php

namespace App\Foundation\ModelTrait;

use Carbon\Carbon;

interface HaveTimestampModelTraitInterface
{
    /**
     * @return Carbon
     */
    public function getCreatedAt(): Carbon;

    /**
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon;
}
