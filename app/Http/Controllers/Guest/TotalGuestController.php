<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Modules\Guest\Handler\TotalGuest;

class TotalGuestController extends Controller
{
    /**
     * @param TotalGuest $totalGuest
     *
     * @return array
     */
    public function __invoke(TotalGuest $totalGuest)
    {
        return $totalGuest->handle();
    }
}
