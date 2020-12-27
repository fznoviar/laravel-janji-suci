<?php

namespace App\Modules\Project\Contracts;

use App\Foundation\BaseModelInterface;
use Illuminate\Contracts\Support\Arrayable;

interface ProjectInterface extends BaseModelInterface, Arrayable
{
    public const TITLE = 'title';

    public const THEME = 'theme';

    public const URL = 'url';

    public const IS_CUSTOM_DOMAIN = 'is_custom_domain';

    public const DESCRIPTION = 'description';

    public const MAX_GUEST = 'max_guest';

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @return int
     */
    public function getTheme(): int;

    /**
     * @return null|string
     */
    public function getUrl(): ?string;

    /**
     * @return bool
     */
    public function getIsCustomDomain(): bool;

    /**
     * @return null|string
     */
    public function getDescription(): ?string;

    /**
     * @return int
     */
    public function getMaxGuest(): int;
}
