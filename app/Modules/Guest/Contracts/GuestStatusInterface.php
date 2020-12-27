<?php

namespace App\Modules\Guest\Contracts;

interface GuestStatusInterface
{
    public const NEW = 1;

    public const INVITED = 2;

    public const OPENED = 3;

    public const GOING = 4;

    public const NOT_GOING = 5;

    public const ALL_STATUS = [
        self::NEW,
        self::INVITED,
        self::OPENED,
        self::GOING,
        self::NOT_GOING,
    ];
}
