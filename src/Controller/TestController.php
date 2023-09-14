<?php

namespace App\Controller;

use App\Entity\TestEntity;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use function dump;

final class TestController extends AbstractController
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/")
     */
    public function __invoke(): void
    {
        $repository = $this->getDoctrine()->getRepository(TestEntity::class);

        $qb = $repository->createQueryBuilder('testentity');
        $qb->setMaxResults(1);
        $qb->getQuery()->getResult();

        dump($qb->getQuery()->getResult());
        die();
    }
}
