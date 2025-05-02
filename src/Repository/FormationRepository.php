<?php

namespace App\Repository;

use App\Entity\Formation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Formation>
 *
 * @method Formation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Formation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Formation[]    findAll()
 * @method Formation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Formation::class);
    }

    /**
     * Recherche des formations par terme de recherche (nom ou publication_id)
     *
     * @param string|null $searchTerm
     * @return Formation[]
     */
    public function findBySearchTerm(?string $searchTerm): array
    {
        if (!$searchTerm) {
            return $this->findAll();
        }

        $qb = $this->createQueryBuilder('f');
        
        return $qb
            ->where('f.nom LIKE :term')
            ->orWhere('f.publication_id LIKE :term')
            ->orWhere('f.description LIKE :term')
            ->setParameter('term', '%' . $searchTerm . '%')
            ->orderBy('f.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // Ajoutez vos méthodes de recherche personnalisées ici...
}
