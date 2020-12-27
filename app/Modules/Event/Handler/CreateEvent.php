<?php

namespace App\Modules\Event\Handler;

use App\Modules\Event\Contracts\EventInterface;
use App\Modules\Event\EventModel;
use App\Modules\Project\ProjectModel;
use Illuminate\Http\Request;

class CreateEvent
{
    /**
     * @param Request $request
     * @param int     $projectId
     *
     * @return EventInterface
     */
    public function handle(Request $request, int $projectId): EventInterface
    {
        $inputs = $this->validate($request);
        $project = ProjectModel::query()->findOrFail($projectId);

        return $this->createEvent($inputs, $project);
    }

    /**
     * @param array        $inputs
     * @param ProjectModel $project
     *
     * @return EventModel
     */
    private function createEvent(array $inputs, ProjectModel $project)
    {
        /** @var EventModel $event */
        $event = EventModel::make($inputs);
        $event->setProject($project);
        $event->save();

        return $event;
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
                EventInterface::TITLE    => [
                    'required',
                ],
                EventInterface::START_AT => [
                    'date',
                ],
                EventInterface::END_AT   => [
                    'date',
                    'after_or_equal:'.EventInterface::START_AT,
                ],
            ]
        );
    }
}
