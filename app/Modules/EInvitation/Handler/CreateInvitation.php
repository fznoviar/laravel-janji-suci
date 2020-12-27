<?php

namespace App\Modules\EInvitation\Handler;

use App\Modules\EInvitation\Contracts\EInvitationInterface;
use App\Modules\EInvitation\EInvitationModel;
use App\Modules\Project\ProjectModel;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class CreateInvitation
{
    /**
     * @param Request $request
     * @param int     $projectId
     *
     * @return EInvitationInterface
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function handle(Request $request, int $projectId): EInvitationInterface
    {
        /** @var ProjectModel $project */
        $project = ProjectModel::findOrFail($projectId);
        $inputs = $this->getInputs($request);

        $invitation = new EInvitationModel();
        $invitation->setAttributes($inputs);
        if ($request->hasFile(EInvitationInterface::COVER)) {
            $invitation->addMediaFromRequest(EInvitationInterface::COVER)
                       ->toMediaCollection($invitation->getTable())
            ;
        }

        $invitation->setProject($project);
        $invitation->save();

        return $invitation;
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    private function getInputs(Request $request): array
    {
        $inputs = $request->validate(
            [
                EInvitationInterface::FONT            => [],
                EInvitationInterface::TITLE           => [],
                EInvitationInterface::TEXT_TOP        => [],
                EInvitationInterface::TEXT_BOTTOM     => [],
                EInvitationInterface::MESSAGE         => [],
                EInvitationInterface::IS_DISPLAY_TEXT => [
                    'in:0,1',
                ],
                EInvitationInterface::IS_DISPLAY_QR   => [
                    'in:0,1',
                ],
                EInvitationInterface::COVER           => [
                    'file',
                ],
            ]
        );

        unset($inputs[EInvitationInterface::COVER]);

        return $inputs;
    }
}
