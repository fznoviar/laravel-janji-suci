<?php

namespace App\Modules\Guest\Utils;

class GuestStatusText
{
    /**
     * @param $statusId
     *
     * @return string
     */
    public static function get($statusId): string
    {
        return trans(
            sprintf('guest.status.%s', $statusId)
        );
    }
}
