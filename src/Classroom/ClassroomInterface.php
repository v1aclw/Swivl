<?php
declare(strict_types=1);

namespace App\Classroom;

interface ClassroomInterface extends \JsonSerializable
{
    public const FIELD_ID = 'id';

    public const FIELD_NAME = 'name';

    public const FIELD_CREATED_AT = 'created_at';

    public const FIELD_ENABLED = 'enabled';

    public function getId(): int;

    public function getName(): string;

    public function getCreatedAt(): ?\DateTimeInterface;

    public function isEnabled(): bool;
}