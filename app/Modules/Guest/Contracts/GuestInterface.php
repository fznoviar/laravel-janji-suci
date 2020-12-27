<?php

namespace App\Modules\Guest\Contracts;

use App\Foundation\ModelTrait\HaveTimestampModelTraitInterface;
use App\Modules\Project\Contracts\HaveProjectInterface;
use Illuminate\Contracts\Support\Arrayable;

interface GuestInterface extends Arrayable, HaveTimestampModelTraitInterface, HaveProjectInterface
{
    public const CODE = 'code';

    public const STATUS_ID = 'status_id';

    public const FORMAT_ID = 'format_id';

    public const NAME = 'name';

    public const EMAIL = 'email';

    public const PHONE_NUMBER = 'phone_number';

    public const ADDRESS = 'address';

    public const IS_VIP = 'is_vip';

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getCode(): string;

    /**
     * @return int
     */
    public function getStatusId(): int;

    /**
     * @return string
     */
    public function getStatusText(): string;

    /**
     * @return int
     */
    public function getFormatId(): int;

    /**
     * @return string
     */
    public function getFormatText(): string;

    /**
     * @return null|string
     */
    public function getName(): ?string;

    /**
     * @return null|string
     */
    public function getEmail(): ?string;

    /**
     * @return null|string
     */
    public function getPhoneNumber(): ?string;

    /**
     * @return null|string
     */
    public function getAddress(): ?string;

    /**
     * @return bool
     */
    public function getIsVIP(): bool;
}
