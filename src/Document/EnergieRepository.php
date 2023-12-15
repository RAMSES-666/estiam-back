<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Repository\DocumentRepository;
/**
 * Description of EnergieRepository
 *
 * @author arun
 */
class EnergieRepository extends DocumentRepository {
    public function getProductionByEnergie($filtre, $value)
    {
        return $this->createQueryBuilder()
              ->find()
              ->field('fields.'.$filtre)->equals($value)
              ->getQuery()
              ->execute();
    }
}