<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity
 */
class Categorie
{
    /**
     * @var int
     *
     * @ORM\Column(name="cat_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $catId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cat_nom", type="string", length=50, nullable=true)
     */
    private $catNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cat_age_tranche_deb", type="string", length=10, nullable=true)
     */
    private $catAgeTrancheDeb;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cat_age_tranche_fin", type="string", length=10, nullable=true)
     */
    private $catAgeTrancheFin;

    public function getCatId(): ?int
    {
        return $this->catId;
    }

    public function getCatNom(): ?string
    {
        return $this->catNom;
    }

    public function setCatNom(?string $catNom): self
    {
        $this->catNom = $catNom;

        return $this;
    }

    public function getCatAgeTrancheDeb(): ?string
    {
        return $this->catAgeTrancheDeb;
    }

    public function setCatAgeTrancheDeb(?string $catAgeTrancheDeb): self
    {
        $this->catAgeTrancheDeb = $catAgeTrancheDeb;

        return $this;
    }

    public function getCatAgeTrancheFin(): ?string
    {
        return $this->catAgeTrancheFin;
    }

    public function setCatAgeTrancheFin(?string $catAgeTrancheFin): self
    {
        $this->catAgeTrancheFin = $catAgeTrancheFin;

        return $this;
    }


}
