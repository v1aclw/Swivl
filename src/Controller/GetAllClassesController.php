<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetAllClassesController
{
    public function __construct()
    {
    }

    public function __invoke(): Response
    {
        return new JsonResponse();
    }
}