<?php

namespace App\Modules\Project;

use App\Foundation\BaseModel;
use App\Modules\Project\Contracts\ProjectInterface;

class ProjectModel extends BaseModel implements ProjectInterface
{
    protected $table = 'project';

    protected $fillable = [
        self::TITLE,
        self::THEME,
        self::URL,
        self::IS_CUSTOM_DOMAIN,
        self::DESCRIPTION,
        self::MAX_GUEST,
    ];

    protected $casts = [
        self::THEME            => 'int',
        self::IS_CUSTOM_DOMAIN => 'bool',
        self::MAX_GUEST        => 'int',
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
    public function getTitle(): string
    {
        return $this->{self::TITLE};
    }

    /**
     * @inheritDoc
     */
    public function getTheme(): int
    {
        return $this->{self::THEME};
    }

    /**
     * @inheritDoc
     */
    public function getUrl(): ?string
    {
        return $this->{self::URL};
    }

    /**
     * @inheritDoc
     */
    public function getIsCustomDomain(): bool
    {
        return $this->{self::IS_CUSTOM_DOMAIN};
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): ?string
    {
        return $this->{self::DESCRIPTION};
    }

    /**
     * @inheritDoc
     */
    public function getMaxGuest(): int
    {
        return $this->{self::MAX_GUEST};
    }
}
