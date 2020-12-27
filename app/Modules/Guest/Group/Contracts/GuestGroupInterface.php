<?php

namespace App\Modules\Guest\Group\Contracts;

interface GuestGroupInterface
{
    public const NAME = 'name';

    public const DESCRIPTION = 'description';

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return null|string
     */
    public function getDescription(): ?string;
}
