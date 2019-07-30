<?php
declare(strict_types=1);

namespace App\Classroom\Factory;

use App\Classroom\Classroom;
use App\Classroom\ClassroomInterface;

class ClassroomFactory implements ClassroomFactoryInterface
{
    public function create(int $id, string $name, bool $enabled, ?\DateTimeInterface $createdAt = null): ClassroomInterface
    {
        return new Classroom($id, $name, $enabled, $createdAt);
    }
}