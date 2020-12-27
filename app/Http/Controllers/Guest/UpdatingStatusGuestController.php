<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Resources\Guest\GuestResource;
use App\Modules\Guest\Handler\UpdateStatusGuest;
use Illuminate\Http\Request;

class UpdatingStatusGuestController extends Controller
{
    /**
     * @param Request           $request
     * @param UpdateStatusGuest $updateStatusGuest
     * @param string            $code
     *
     * @return GuestResource
     */
    public function __invoke(Request $request, UpdateStatusGuest $updateStatusGuest, string $code)
    {
        return new GuestResource(
            $updateStatusGuest->handle($request, $code)
        );
    }
}
