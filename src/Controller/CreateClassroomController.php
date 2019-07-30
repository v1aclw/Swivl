<?php
declare(strict_types=1);

namespace App\Controller;

use App\Classroom\Storage\ClassroomStorageInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateClassroomController
{
    private $classroomStorage;

    public function __construct(ClassroomStorageInterface $classroomStorage)
    {
        $this->classroomStorage = $classroomStorage;
    }

    public function __invoke(Request $request): Response
    {
        return new JsonResponse(
            $this->classroomStorage->getById(
                $this->classroomStorage->create((string)$request->get('name'), (bool)$request->get('enabled'))
            )
        );
    }
}