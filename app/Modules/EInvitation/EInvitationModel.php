<?php

namespace App\Modules\EInvitation;

use App\Foundation\BaseModel;
use App\Modules\EInvitation\Contracts\EInvitationInterface;
use App\Modules\Project\HaveProjectTrait;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class EInvitationModel extends BaseModel implements EInvitationInterface
{
    use HaveProjectTrait;
    use InteractsWithMedia;

    protected $table = 'e_invitation';

    protected $fillable = [
        self::FONT,
        self::TITLE,
        self::TEXT_TOP,
        self::TEXT_BOTTOM,
        self::IS_DISPLAY_TEXT,
        self::IS_DISPLAY_QR,
        self::MESSAGE,
    ];

    protected $casts = [
        self::IS_DISPLAY_TEXT => 'bool',
        self::IS_DISPLAY_QR   => 'bool',
    ];

    /**
     * @inheritDoc
     */
    public function getFont(): ?string
    {
        return $this->{self::FONT};
    }

    /**
     * @inheritDoc
     */
    public function getTitle(): ?string
    {
        return $this->{self::TITLE};
    }

    /**
     * @inheritDoc
     */
    public function getTextTop(): ?string
    {
        return $this->{self::TEXT_TOP};
    }

    /**
     * @inheritDoc
     */
    public function getTextBottom(): ?string
    {
        return $this->{self::TEXT_BOTTOM};
    }

    /**
     * @inheritDoc
     */
    public function getMessage(): ?string
    {
        return $this->{self::MESSAGE};
    }

    /**
     * @inheritDoc
     */
    public function isDisplayText(): bool
    {
        return $this->{self::IS_DISPLAY_TEXT};
    }

    /**
     * @inheritDoc
     */
    public function isDisplayQr(): bool
    {
        return $this->{self::IS_DISPLAY_QR};
    }

    /**
     * @inheritDoc
     */
    public function getCover(): ?Media
    {
        $mediaCollection = $this->getMedia($this->getTable());

        return $mediaCollection->first();
    }
}
