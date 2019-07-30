<?php
declare(strict_types=1);

namespace App\Classroom\Factory;

use App\Classroom\ClassroomInterface;

interface ClassroomFactoryInterface
{
    public function create(int $id, string $name, \DateTimeInterface $createdAt, bool $enabled): ClassroomInterface;
}