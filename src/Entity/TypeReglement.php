<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * TypeReglement
 *
 * @ORM\Table(name="type_reglement")
 * @ORM\Entity
 */
class TypeReglement
{
    /**
     * @var int
     *
     * @ORM\Column(name="typreg_code", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $typregCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typreg_nom", type="string", length=50, nullable=true)
     */
    private $typregNom;

    public function getTypregCode(): ?int
    {
        return $this->typregCode;
    }

    public function getTypregNom(): ?string
    {
        return $this->typregNom;
    }

    public function setTypregNom(?string $typregNom): self
    {
        $this->typregNom = $typregNom;

        return $this;
    }


}
