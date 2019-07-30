<?php
declare(strict_types=1);

namespace App\Controller;

use App\Classroom\Storage\ClassroomStorageInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetClassroomController
{
    private $classroomStorage;

    public function __construct(ClassroomStorageInterface $classroomStorage)
    {
        $this->classroomStorage = $classroomStorage;
    }

    public function __invoke(int $id): Response
    {
        return new JsonResponse($this->classroomStorage->getById($id));
    }
}