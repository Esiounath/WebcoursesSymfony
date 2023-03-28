<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * TypeEpreuve
 *
 * @ORM\Table(name="type_epreuve")
 * @ORM\Entity
 */
class TypeEpreuve
{
    /**
     * @var int
     *
     * @ORM\Column(name="typep_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $typepId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typep_nom", type="string", length=50, nullable=true)
     */
    private $typepNom;

    public function getTypepId(): ?int
    {
        return $this->typepId;
    }

    public function getTypepNom(): ?string
    {
        return $this->typepNom;
    }

    public function setTypepNom(?string $typepNom): self
    {
        $this->typepNom = $typepNom;

        return $this;
    }


}
