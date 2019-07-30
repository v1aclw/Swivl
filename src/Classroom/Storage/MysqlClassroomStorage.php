<?php
declare(strict_types=1);

namespace App\Classroom\Storage;

use App\Classroom\ClassroomInterface;
use Doctrine\DBAL\Driver\Connection;

class MysqlClassroomStorage implements ClassroomStorageInterface
{
    private const TABLE_NAME = 'classroom';
    private const FIELD_ID = ClassroomInterface::FIELD_ID;
    private const FIELD_NAME = ClassroomInterface::FIELD_NAME;
    private const FIELD_CREATED_AT = ClassroomInterface::FIELD_CREATED_AT;
    private const FIELD_ENABLED = ClassroomInterface::FIELD_ENABLED;

    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getAll(): \Generator
    {
        $connection->fetchAll('SELECT * FROM users');
    }

    public function getById(int $id): ?ClassroomInterface
    {
        // TODO: Implement getById() method.
    }

    public function create(string $name, bool $enabled): ClassroomInterface
    {
        // TODO: Implement create() method.
    }

    public function update(ClassroomInterface $classroom, string $name, bool $enabled): ClassroomInterface
    {
        // TODO: Implement update() method.
    }

    public function remove(int $id): bool
    {
        // TODO: Implement remove() method.
    }
}