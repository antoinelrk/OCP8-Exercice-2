<?php

namespace App\Service;

use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;

readonly class ProjectService
{
    public function __construct(
        protected EntityManagerInterface $entityManager
    ) {}

    public function delete(Project $project): bool
    {
        $this->entityManager->remove($project);
        $this->entityManager->flush();

        return true;
    }
}