<?php

namespace App\Modules\Guest\Handler;

use App\Modules\Guest\Contracts\GuestStatusInterface;
use App\Modules\Guest\GuestModel;
use App\Modules\Guest\Utils\GuestStatusText;
use Illuminate\Support\Collection;

class TotalGuest
{
    /**
     * @return array
     */
    public function handle(): array
    {
        $guests = GuestModel::all();

        return [
            'by_status' => [
                GuestStatusText::get(GuestStatusInterface::NEW)       => $this->countByStatus(
                    $guests,
                    GuestStatusInterface::NEW
                ),
                GuestStatusText::get(GuestStatusInterface::INVITED)   => $this->countByStatus(
                    $guests,
                    GuestStatusInterface::INVITED
                ),
                GuestStatusText::get(GuestStatusInterface::OPENED)    => $this->countByStatus(
                    $guests,
                    GuestStatusInterface::OPENED
                ),
                GuestStatusText::get(GuestStatusInterface::GOING)     => $this->countByStatus(
                    $guests,
                    GuestStatusInterface::GOING
                ),
                GuestStatusText::get(GuestStatusInterface::NOT_GOING) => $this->countByStatus(
                    $guests,
                    GuestStatusInterface::NOT_GOING
                ),
            ],
            'total'     => $guests->count(),
        ];
    }

    /**
     * @param Collection $guests
     * @param int        $statusId
     *
     * @return int
     */
    private function countByStatus(Collection $guests, int $statusId): int
    {
        return $guests
            ->filter(
                function (GuestModel $guestModel) use ($statusId) {
                    return $guestModel->getStatusId() === $statusId;
                }
            )
            ->count()
            ;
    }
}
