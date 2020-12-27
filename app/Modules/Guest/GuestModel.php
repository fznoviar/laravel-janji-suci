<?php

namespace App\Modules\Guest;

use App\Foundation\ModelTrait\HaveTimestampModelTrait;
use App\Modules\Guest\Contracts\GuestInterface;
use App\Modules\Guest\Utils\GuestStatusText;
use App\Modules\Project\HaveProjectTrait;
use Illuminate\Database\Eloquent\Model;

class GuestModel extends Model implements GuestInterface
{
    use HaveTimestampModelTrait;
    use HaveProjectTrait;

    protected $table = 'guest';

    protected $fillable = [
        self::CODE,
        self::NAME,
        self::STATUS_ID,
        self::FORMAT_ID,
        self::EMAIL,
        self::PHONE_NUMBER,
        self::ADDRESS,
        self::IS_VIP,
    ];

    protected $casts = [
        self::STATUS_ID  => 'int',
        self::FORMAT_ID  => 'int',
        self::IS_VIP     => 'bool',
        self::PROJECT_ID => 'int',
    ];

    /**
     * @inheritDoc
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getCode(): string
    {
        return $this->{self::CODE};
    }

    /**
     * @inheritDoc
     */
    public function getStatusId(): int
    {
        return $this->{self::STATUS_ID};
    }

    /**
     * @inheritDoc
     */
    public function getStatusText(): string
    {
        return GuestStatusText::get($this->getStatusId());
    }

    /**
     * @inheritDoc
     */
    public function getFormatId(): int
    {
        return $this->{self::FORMAT_ID};
    }

    /**
     * @inheritDoc
     */
    public function getFormatText(): string
    {
        return trans(
            sprintf('guest.format.%s', $this->getFormatId())
        );
    }

    /**
     * @inheritDoc
     */
    public function getName(): ?string
    {
        return $this->{self::NAME};
    }

    /**
     * @inheritDoc
     */
    public function getEmail(): ?string
    {
        return $this->{self::EMAIL};
    }

    /**
     * @inheritDoc
     */
    public function getPhoneNumber(): ?string
    {
        return $this->{self::PHONE_NUMBER};
    }

    /**
     * @inheritDoc
     */
    public function getAddress(): ?string
    {
        return $this->{self::ADDRESS};
    }

    /**
     * @inheritDoc
     */
    public function getIsVIP(): bool
    {
        return $this->{self::IS_VIP};
    }
}
