<?php


namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 *
 * @ORM\Table(name="club")
 * @ORM\Entity
 */
class Club
{
    /**
     * @var int
     *
     * @ORM\Column(name="cl_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $clId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cl_nom", type="string", length=50, nullable=true)
     */
    private $clNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cl_adresse", type="string", length=100, nullable=true)
     */
    private $clAdresse;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cl_numtel", type="integer", nullable=true)
     */
    private $clNumtel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cl_email", type="string", length=50, nullable=true)
     */
    private $clEmail;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Coureur", mappedBy="cl")
     */
    private $co = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->co = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getClId(): ?int
    {
        return $this->clId;
    }

    public function getClNom(): ?string
    {
        return $this->clNom;
    }

    public function setClNom(?string $clNom): self
    {
        $this->clNom = $clNom;

        return $this;
    }

    public function getClAdresse(): ?string
    {
        return $this->clAdresse;
    }

    public function setClAdresse(?string $clAdresse): self
    {
        $this->clAdresse = $clAdresse;

        return $this;
    }

    public function getClNumtel(): ?int
    {
        return $this->clNumtel;
    }

    public function setClNumtel(?int $clNumtel): self
    {
        $this->clNumtel = $clNumtel;

        return $this;
    }

    public function getClEmail(): ?string
    {
        return $this->clEmail;
    }

    public function setClEmail(?string $clEmail): self
    {
        $this->clEmail = $clEmail;

        return $this;
    }

    /**
     * @return Collection<int, Coureur>
     */
    public function getCo(): Collection
    {
        return $this->co;
    }

    public function addCo(Coureur $co): self
    {
        if (!$this->co->contains($co)) {
            $this->co->add($co);
            $co->addCl($this);
        }

        return $this;
    }

    public function removeCo(Coureur $co): self
    {
        if ($this->co->removeElement($co)) {
            $co->removeCl($this);
        }

        return $this;
    }

}
