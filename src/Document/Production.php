<?php
namespace App\Document;
/**
 * Description of Production
 *
 * @author arun
 */

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document(repositoryClass: EnergieRepository::class)]
class Production {

 #[MongoDB\Id]
 protected $id;


    #[MongoDB\EmbedOne(targetDocument: Energie::class)]
    private $fields;

    #[MongoDB\Field(type: 'collection')]
    private array $geometry = [];

    public function getId(): string {
        return $this->id;
    }

    public function getFields() {
        return $this->fields;
    }

    public function setId(string $id): void {
        $this->id = $id;
    }

    public function setFields(Energie $fields): void {
        $this->fields = $fields;
    }

    public function getGeometry(): array {
        return $this->geometry;
    }

    public function setGeometry(array $geometry): void {
        $this->geometry = $geometry;
    }

}