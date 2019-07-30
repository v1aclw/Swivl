<?php
declare(strict_types=1);

namespace App\Classroom\Storage\Serializer;

use App\Classroom\ClassroomInterface;

interface ClassroomStorageSerializerInterface
{
    public const FIELD_ID = ClassroomInterface::FIELD_ID;
    public const FIELD_NAME = ClassroomInterface::FIELD_NAME;
    public const FIELD_CREATED_AT = ClassroomInterface::FIELD_CREATED_AT;
    public const FIELD_ENABLED = ClassroomInterface::FIELD_ENABLED;

    public function serialize(ClassroomInterface $classroom): array;

    public function deserialize(array $classroomData): ClassroomInterface;
}