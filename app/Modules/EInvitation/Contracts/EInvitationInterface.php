<?php

namespace App\Modules\EInvitation\Contracts;

use App\Foundation\BaseModelInterface;
use App\Modules\Project\Contracts\HaveProjectInterface;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

interface EInvitationInterface extends BaseModelInterface, HaveProjectInterface, HasMedia
{
    public const FONT = 'font';

    public const IS_DISPLAY_TEXT = 'is_display_text_over_cover';

    public const TITLE = 'title';

    public const TEXT_TOP = 'text_top';

    public const TEXT_BOTTOM = 'text_bottom';

    public const MESSAGE = 'message';

    public const IS_DISPLAY_QR = 'is_display_qr';

    public const COVER = 'cover';

    /**
     * @return null|string
     */
    public function getFont(): ?string;

    /**
     * @return null|string
     */
    public function getTitle(): ?string;

    /**
     * @return null|string
     */
    public function getTextTop(): ?string;

    /**
     * @return null|string
     */
    public function getTextBottom(): ?string;

    /**
     * @return null|string
     */
    public function getMessage(): ?string;

    /**
     * @return bool
     */
    public function isDisplayText(): bool;

    /**
     * @return bool
     */
    public function isDisplayQr(): bool;

    /**
     * @return null|Media
     */
    public function getCover(): ?Media;
}
