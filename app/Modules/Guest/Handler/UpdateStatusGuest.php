<?php

namespace App\Modules\Guest\Handler;

use App\Modules\Guest\Contracts\GuestStatusInterface;
use App\Modules\Guest\GuestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UpdateStatusGuest
{
    /**
     * @param Request $request
     * @param string  $code
     *
     * @return GuestModel
     */
    public function handle(Request $request, string $code)
    {
        /** @var GuestModel $guest */
        $guest = GuestModel::where('code', $code)->firstOrFail();

        $guest->setAttribute('status_id', Arr::get($this->getInputs($request), 'status_id'));
        $guest->save();

        return $guest;
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    private function getInputs(Request $request)
    {
        return $request->validate(
            [
                'status_id' => [
                    'required',
                    'in:'.implode(',', GuestStatusInterface::ALL_STATUS),
                ],
            ]
        );
    }
}
