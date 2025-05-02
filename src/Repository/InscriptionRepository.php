<?php

namespace App\Repository;

use App\Entity\Inscription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class InscriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Inscription::class);
    }

    /**
     * Récupère toutes les inscriptions triées par date (les plus anciennes d'abord)
     *
     * @return Inscription[]
     */
    public function findAllOrderByDateAsc(): array
    {
        return $this->createQueryBuilder('i')
            ->orderBy('i.dateInscription', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère toutes les inscriptions triées par date (les plus récentes d'abord)
     *
     * @return Inscription[]
     */
    public function findAllOrderByDateDesc(): array
    {
        return $this->createQueryBuilder('i')
            ->orderBy('i.dateInscription', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Recherche des inscriptions par terme de recherche (userId ou formationId)
     *
     * @param string|null $searchTerm
     * @param string $sortOrder Ordre de tri ('ASC' ou 'DESC')
     * @return Inscription[]
     */
    public function findBySearchTerm(?string $searchTerm, string $sortOrder = 'DESC'): array
    {
        if (!$searchTerm) {
            return $this->findBy([], ['dateInscription' => $sortOrder]);
        }

        $qb = $this->createQueryBuilder('i');
        
        return $qb
            ->where('i.userId LIKE :term')
            ->orWhere('i.formationId LIKE :term')
            ->setParameter('term', '%' . $searchTerm . '%')
            ->orderBy('i.dateInscription', $sortOrder)
            ->getQuery()
            ->getResult();
    }
}
