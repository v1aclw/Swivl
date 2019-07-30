<?php
declare(strict_types=1);

namespace App\Classroom\Storage;

use App\Classroom\ClassroomInterface;
use App\Classroom\Storage\Serializer\ClassroomStorageSerializerInterface;
use Doctrine\DBAL\Connection;

class MysqlClassroomStorage implements ClassroomStorageInterface
{
    private const TABLE_NAME = 'classroom';

    private $connection;

    private $classroomStorageSerializer;

    public function __construct(Connection $connection, ClassroomStorageSerializerInterface $classroomStorageSerializer)
    {
        $this->connection = $connection;
        $this->classroomStorageSerializer = $classroomStorageSerializer;
    }

    public function getAll(): \Generator
    {
        $statement = $this->connection->createQueryBuilder()
            ->select('*')
            ->from(self::TABLE_NAME)
            ->execute();

        foreach ($statement->fetchAll() as $record) {
            yield $this->classroomStorageSerializer->deserialize($record);
        }
    }

    public function getById(int $id): ?ClassroomInterface
    {
        $statement = $this->connection->createQueryBuilder()
            ->select('*')
            ->from(self::TABLE_NAME)
            ->where(sprintf('%s = :id', ClassroomStorageSerializerInterface::FIELD_ID))
            ->setParameter('id', $id)
            ->execute();

        if (0 === $statement->rowCount()) {
            return null;
        }

        return $this->classroomStorageSerializer->deserialize($statement->fetch());
    }

    public function create(string $name, bool $enabled): int
    {
        $this->connection->createQueryBuilder()
            ->insert(self::TABLE_NAME)
            ->values([
                ClassroomStorageSerializerInterface::FIELD_NAME => ':name',
                ClassroomStorageSerializerInterface::FIELD_CREATED_AT => 'NOW()',
                ClassroomStorageSerializerInterface::FIELD_ENABLED => ':enabled'
            ])
            ->setParameters([
                'name' => $name,
                'enabled' => (int)$enabled
            ])
            ->execute();

        return (int)$this->connection->lastInsertId();
    }

    public function update(int $id, string $name, bool $enabled): bool
    {
        return (bool)$this->connection->createQueryBuilder()
            ->update(self::TABLE_NAME)
            ->set(ClassroomStorageSerializerInterface::FIELD_NAME, ':name')
            ->set(ClassroomStorageSerializerInterface::FIELD_ENABLED, ':enabled')
            ->where(sprintf('%s = :id', ClassroomStorageSerializerInterface::FIELD_ID))
            ->setParameters([
                'name' => $name,
                'enabled' => (int)$enabled,
                'id' => $id
            ])
            ->execute();
    }

    public function remove(int $id): bool
    {
        return (bool)$this->connection->createQueryBuilder()
            ->delete(self::TABLE_NAME)
            ->where(sprintf('%s = :id', ClassroomStorageSerializerInterface::FIELD_ID))
            ->setParameter('id', $id)
            ->execute();
    }

    public function updateStatus(int $id, bool $status): bool
    {
        return (bool)$this->connection->createQueryBuilder()
            ->update(self::TABLE_NAME)
            ->set(ClassroomStorageSerializerInterface::FIELD_ENABLED, ':enabled')
            ->where(sprintf('%s = :id', ClassroomStorageSerializerInterface::FIELD_ID))
            ->setParameters([
                'enabled' => (int) $status,
                'id' => $id
            ])
            ->execute();
    }
}