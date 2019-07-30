<?php
declare(strict_types=1);

namespace App\Classroom\Factory;

use App\Classroom\Classroom;
use App\Classroom\ClassroomInterface;

class ClassroomFactory implements ClassroomFactoryInterface
{
    public function create(int $id, string $name, \DateTimeInterface $createdAt, bool $enabled): ClassroomInterface
    {
        return new Classroom($id, $name, $createdAt, $enabled);
    }
}