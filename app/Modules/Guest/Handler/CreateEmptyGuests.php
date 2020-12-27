<?php

namespace App\Modules\Guest\Handler;

use App\Modules\Guest\Contracts\GuestInterface;
use App\Modules\Guest\Contracts\GuestStatusInterface;
use App\Modules\Guest\GuestModel;
use App\Modules\Project\ProjectModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CreateEmptyGuests
{
    /**
     * @param Request $request
     *
     * @return Collection
     */
    public function handle(Request $request)
    {
        $inputs = $this->validate($request);

        $project = ProjectModel::firstOrFail();

        $amount = intval(Arr::get($inputs, 'amount'), 1);
        $guests = [];
        foreach (range(1, $amount) as $item) {
            /** @var GuestModel $guest */
            $guest = GuestModel::make(
                [
                    GuestInterface::CODE      => (string) Str::uuid(),
                    GuestInterface::STATUS_ID => GuestStatusInterface::NEW,
                ]
            );
            $guest->setProject($project);
            $guest->save();
            $guests[] = $guest;
        }

        return $guests;
    }

    private function validate(Request $request): array
    {
        return $request->validate(
            [
                'amount' => [
                    'required',
                    'integer',
                ],
            ]
        );
    }
}
