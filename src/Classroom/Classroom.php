<?php
declare(strict_types=1);

namespace App\Classroom;

class Classroom implements ClassroomInterface
{
    private $id;

    private $name;

    private $createdAt;

    private $enabled;

    public function __construct(int $id, string $name, \DateTimeInterface $createdAt, bool $enabled)
    {
        $this->id = $id;
        $this->name = $name;
        $this->createdAt = $createdAt;
        $this->enabled = $enabled;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function jsonSerialize(): array
    {
        return [
            self::FIELD_ID => $this->id,
            self::FIELD_NAME => $this->name,
            self::FIELD_CREATED_AT => $this->createdAt->format(\DateTimeInterface::W3C),
            self::FIELD_ENABLED => $this->enabled
        ];
    }
}