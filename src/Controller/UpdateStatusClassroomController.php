<?php
declare(strict_types=1);

namespace App\Controller;

use App\Classroom\Storage\ClassroomStorageInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateStatusClassroomController
{
    private $classroomStorage;

    public function __construct(ClassroomStorageInterface $classroomStorage)
    {
        $this->classroomStorage = $classroomStorage;
    }

    public function __invoke(int $id, int $status): Response
    {
        $result = $this->classroomStorage->updateStatus($id, (bool)$status);
        if (false === $result) {
            return new JsonResponse([], 400);
        }

        return new JsonResponse($this->classroomStorage->getById($id));
    }
}