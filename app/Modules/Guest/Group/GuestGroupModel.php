<?php

namespace App\Modules\Guest\Group;

use App\Modules\Guest\Group\Contracts\GuestGroupInterface;
use Illuminate\Database\Eloquent\Model;

class GuestGroupModel extends Model implements GuestGroupInterface
{
    protected $table = 'guest_group';

    protected $fillable = [
        self::NAME,
        self::DESCRIPTION,
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
    public function getName(): string
    {
        return $this->{self::NAME};
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): ?string
    {
        return $this->{self::DESCRIPTION};
    }
}
