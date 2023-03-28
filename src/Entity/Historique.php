<?php


namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Historique
 *
 * @ORM\Table(name="historique")
 * @ORM\Entity
 */
class Historique
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_historique", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idHistorique;

    /**
     * @var string|null
     *
     * @ORM\Column(name="log", type="string", length=150, nullable=true)
     */
    private $log;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Epreuve", mappedBy="idHistorique")
     */
    private $idEpreuve = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idEpreuve = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdHistorique(): ?int
    {
        return $this->idHistorique;
    }

    public function getLog(): ?string
    {
        return $this->log;
    }

    public function setLog(?string $log): self
    {
        $this->log = $log;

        return $this;
    }

    /**
     * @return Collection<int, Epreuve>
     */
    public function getIdEpreuve(): Collection
    {
        return $this->idEpreuve;
    }

    public function addIdEpreuve(Epreuve $idEpreuve): self
    {
        if (!$this->idEpreuve->contains($idEpreuve)) {
            $this->idEpreuve->add($idEpreuve);
            $idEpreuve->addIdHistorique($this);
        }

        return $this;
    }

    public function removeIdEpreuve(Epreuve $idEpreuve): self
    {
        if ($this->idEpreuve->removeElement($idEpreuve)) {
            $idEpreuve->removeIdHistorique($this);
        }

        return $this;
    }

}
