<?php

namespace App\Modules\Guest\Handler;

use App\Modules\Guest\Contracts\GuestInterface;
use App\Modules\Guest\Contracts\GuestStatusInterface;
use App\Modules\Guest\GuestModel;
use App\Modules\Project\ProjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CreateGuest
{
    /**
     * @param Request $request
     *
     * @return GuestInterface
     */
    public function handle(Request $request)
    {
        $inputs = $this->validate($request);

        return $this->createGuest($inputs);
    }

    /**
     * @param array $inputs
     *
     * @return GuestInterface
     */
    private function createGuest(array $inputs)
    {
        $project = ProjectModel::firstOrFail();
        /** @var GuestModel $guest */
        $guest = GuestModel::make(
            array_merge(
                $inputs,
                [
                    GuestInterface::CODE      => (string) Str::uuid(),
                    GuestInterface::STATUS_ID => GuestStatusInterface::NEW,
                ]
            )
        );
        $guest->setProject($project);
        $guest->save();

        return $guest;
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    private function validate(Request $request): array
    {
        return $request->validate(
            [
                GuestInterface::NAME         => [
                    'required',
                ],
                GuestInterface::EMAIL        => [
                    'required',
                    'email',
                ],
                GuestInterface::PHONE_NUMBER => [
                    'required',
                ],
                GuestInterface::IS_VIP       => [
                    'boolean',
                ],
                GuestInterface::ADDRESS      => [

                ],
                GuestInterface::FORMAT_ID    => [

                ],
            ]
        );
    }
}
