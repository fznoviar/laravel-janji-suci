<?php

use App\Modules\Guest\Contracts\GuestFormatInterface;
use App\Modules\Guest\Contracts\GuestStatusInterface;

return [
    'status' => [
        GuestStatusInterface::NEW       => 'New',
        GuestStatusInterface::INVITED   => 'Invited',
        GuestStatusInterface::OPENED    => 'Opened',
        GuestStatusInterface::GOING     => 'Going',
        GuestStatusInterface::NOT_GOING => 'Not Going',
    ],
    'format' => [
        GuestFormatInterface::DIGITAL  => 'Digital',
        GuestFormatInterface::PHYSICAL => 'Physical',
    ],
];
