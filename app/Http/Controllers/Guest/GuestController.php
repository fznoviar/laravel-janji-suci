<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Resources\Guest\GuestIndexResource;
use App\Http\Resources\Guest\GuestResource;
use App\Modules\Guest\Contracts\GuestRepositoryInterface;
use App\Modules\Guest\GuestModel;
use App\Modules\Guest\Handler\CreateGuest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return GuestIndexResource::collection(GuestModel::paginate());
    }

    /**
     * @param Request     $request
     * @param CreateGuest $createGuest
     *
     * @return GuestResource
     */
    public function store(Request $request, CreateGuest $createGuest)
    {
        $guest = $createGuest->handle($request);

        return new GuestResource($guest);
    }

    /**
     * @param string $code
     *
     * @return GuestResource
     */
    public function show(string $code)
    {
        return new GuestResource(GuestModel::where('code', $code)->first());
    }

    /**
     * @param Request $request
     * @param         $id
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        //
    }
}
