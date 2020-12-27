<?php

namespace App\Http\Resources\Guest;

use App\Modules\Guest\Contracts\GuestInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class GuestIndexResource extends JsonResource
{
    /**
     * @return GuestInterface
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @inheritDoc
     */
    public function toArray($request)
    {
        return [
            'code'         => $this->getResource()->getCode() ?? '-',
            'name'         => $this->getResource()->getName() ?? '-',
            'email'        => $this->getResource()->getEmail() ?? '-',
            'phone'        => $this->getResource()->getPhoneNumber(),
            'status'       => $this->getResource()->getStatusText(),
            'format'       => $this->getResource()->getFormatText(),
            'created_at'   => $this->getResource()->getCreatedAt()->formatLocalized('%d %b, %Y %T'),
            '_showDetails' => true,
        ];
    }
}
