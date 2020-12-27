<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Resources\Guest\GuestCollection;
use App\Modules\Guest\Handler\CreateEmptyGuests;
use Illuminate\Http\Request;

class CreateEmptyGuestController extends Controller
{
    /**
     * @param Request           $request
     * @param CreateEmptyGuests $createEmptyGuests
     *
     * @return GuestCollection
     */
    public function __invoke(Request $request, CreateEmptyGuests $createEmptyGuests)
    {
        return new GuestCollection(
            $createEmptyGuests->handle($request)
        );
    }
}
