<?php
declare(strict_types=1);

namespace App\Classroom\Storage;

use App\Classroom\ClassroomInterface;

interface ClassroomStorageInterface
{
    /**
     * @return \Generator|ClassroomInterface[]
     */
    public function getAll(): \Generator;

    public function getById(int $id): ?ClassroomInterface;

    public function create(string $name, bool $enabled): ClassroomInterface;

    public function update(ClassroomInterface $classroom, string $name, bool $enabled): ClassroomInterface;

    public function remove(int $id): bool;
}