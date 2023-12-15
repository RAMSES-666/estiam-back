<?php
namespace App\Document;
/**
 * Description of Energie
 *
 * @author arun
 */

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\EmbeddedDocument]
class Energie {


    #[MongoDB\Field(type: 'string')]
    private $date_des_donnees;

    #[MongoDB\Field(type: 'string')]
    private $s_3_prod_d_filiere;
    
    #[MongoDB\Field(type: 'string')]
    private $commune;

    #[MongoDB\Field(type: 'string')]
    private $cp;

    public function getDate() {
        return $this->date_des_donnees;
    }

    public function getFiliere() {
        return $this->s_3_prod_d_filiere;
    }

    public function getCommune() {
        return $this->commune;
    }

    public function getCp() {
        return $this->cp;
    }

    public function setDAte($date_des_donnees): void {
        $this->date_des_donnees = $date_des_donnees;
    }

    public function setFiliere($s_3_prod_d_filiere): void {
        $this->s_3_prod_d_filiere = $s_3_prod_d_filiere;
    }

    public function setCommune($commune): void {
        $this->commune = $commune;
    }

    public function setCp($cp): void {
        $this->cp = $cp;
    }
}
