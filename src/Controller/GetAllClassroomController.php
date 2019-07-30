<?php
declare(strict_types=1);

namespace App\Controller;

use App\Classroom\Storage\ClassroomStorageInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetAllClassroomController
{
    private $classroomStorage;

    public function __construct(ClassroomStorageInterface $classroomStorage)
    {
        $this->classroomStorage = $classroomStorage;
    }

    public function __invoke(): Response
    {
        return new JsonResponse(iterator_to_array($this->classroomStorage->getAll(), false));
    }
}