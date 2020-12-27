<?php

namespace App\Http\Resources\Guest;

use App\Modules\Guest\Contracts\GuestInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class GuestResource extends JsonResource
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
            'code'         => $this->getResource()->getCode(),
            'name'         => $this->getResource()->getName(),
            'email'        => $this->getResource()->getEmail(),
            'phone_number' => $this->getResource()->getPhoneNumber(),
            'status'       => $this->getResource()->getStatusText(),
            'format_id'    => $this->getResource()->getFormatId(),
            'is_vip'       => $this->getResource()->getIsVIP(),
            'address'      => $this->getResource()->getAddress(),
            'created_at'   => $this->getResource()->getCreatedAt()->formatLocalized('%d %b, %Y %T'),
        ];
    }
}
