<?php

namespace App\Http\Resources\EInvitation;

use App\Modules\EInvitation\Contracts\EInvitationInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class EInvitationResource extends JsonResource
{
    /**
     * @inheritDoc
     */
    public function toArray($request)
    {
        return [
            'title'           => $this->getResource()->getTitle(),
            'message'         => $this->getResource()->getMessage(),
            'text_top'        => $this->getResource()->getTextTop(),
            'text_bottom'     => $this->getResource()->getTextBottom(),
            'font'            => $this->getResource()->getFont(),
            'is_display_text' => $this->getResource()->isDisplayText(),
            'is_display_qr'   => $this->getResource()->isDisplayQr(),
            'cover'           => $this->getResource()->getCover()->getUrl(),
        ];
    }

    /**
     * @return EInvitationInterface
     */
    private function getResource(): EInvitationInterface
    {
        return $this->resource;
    }
}
