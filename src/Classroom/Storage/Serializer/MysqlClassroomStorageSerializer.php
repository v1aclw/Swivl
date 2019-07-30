<?php
declare(strict_types=1);

namespace App\Classroom\Storage\Serializer;

use App\Classroom\ClassroomInterface;
use App\Classroom\Factory\ClassroomFactoryInterface;

class MysqlClassroomStorageSerializer implements ClassroomStorageSerializerInterface
{
    private $classroomFactory;

    public function __construct(ClassroomFactoryInterface $classroomFactory)
    {
        $this->classroomFactory = $classroomFactory;
    }

    public function serialize(ClassroomInterface $classroom): array
    {
        return [
            self::FIELD_ID => $classroom->getId(),
            self::FIELD_NAME => $classroom->getName(),
            self::FIELD_CREATED_AT => $classroom->getCreatedAt()->format(\DateTimeInterface::W3C),
            self::FIELD_ENABLED => (int)$classroom->isEnabled()
        ];
    }

    public function deserialize(array $classroomData): ClassroomInterface
    {
        return  $this->classroomFactory->create(
            (int)$classroomData[self::FIELD_ID],
            (string)$classroomData[self::FIELD_NAME],
            new \DateTimeImmutable($classroomData[self::FIELD_CREATED_AT]),
            (bool)$classroomData[self::FIELD_ENABLED]
        );
    }
}