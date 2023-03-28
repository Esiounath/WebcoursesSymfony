<?php


namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Epreuve
 *
 * @ORM\Table(name="epreuve", indexes={@ORM\Index(name="ma_id", columns={"ma_id"}), @ORM\Index(name="pa_id", columns={"pa_id"}), @ORM\Index(name="typep_id", columns={"typep_id"})})
 * @ORM\Entity
 */
class Epreuve
{
    /**
     * @var int
     *
     * @ORM\Column(name="ep_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $epId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ep_nom", type="string", length=50, nullable=true)
     */
    private $epNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ep_lieu", type="string", length=50, nullable=true)
     */
    private $epLieu;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ep_datedeb", type="date", nullable=true)
     */
    private $epDatedeb;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ep_datefin", type="date", nullable=true)
     */
    private $epDatefin;

    /**
     * @var \Parcours
     *
     * @ORM\ManyToOne(targetEntity="Parcours")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pa_id", referencedColumnName="pa_id")
     * })
     */
    private $pa;

    /**
     * @var \TypeEpreuve
     *
     * @ORM\ManyToOne(targetEntity="TypeEpreuve")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="typep_id", referencedColumnName="typep_id")
     * })
     */
    private $typep;

    /**
     * @var \Manifestation
     *
     * @ORM\ManyToOne(targetEntity="Manifestation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ma_id", referencedColumnName="ma_id")
     * })
     */
    private $ma;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Historique", inversedBy="idEpreuve")
     * @ORM\JoinTable(name="repertorier",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id_epreuve", referencedColumnName="ep_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_historique", referencedColumnName="id_historique")
     *   }
     * )
     */
    private $idHistorique = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idHistorique = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getEpId(): ?int
    {
        return $this->epId;
    }

    public function getEpNom(): ?string
    {
        return $this->epNom;
    }

    public function setEpNom(?string $epNom): self
    {
        $this->epNom = $epNom;

        return $this;
    }

    public function getEpLieu(): ?string
    {
        return $this->epLieu;
    }

    public function setEpLieu(?string $epLieu): self
    {
        $this->epLieu = $epLieu;

        return $this;
    }

    public function getEpDatedeb(): ?\DateTimeInterface
    {
        return $this->epDatedeb;
    }

    public function setEpDatedeb(?\DateTimeInterface $epDatedeb): self
    {
        $this->epDatedeb = $epDatedeb;

        return $this;
    }

    public function getEpDatefin(): ?\DateTimeInterface
    {
        return $this->epDatefin;
    }

    public function setEpDatefin(?\DateTimeInterface $epDatefin): self
    {
        $this->epDatefin = $epDatefin;

        return $this;
    }

    public function getPa(): ?Parcours
    {
        return $this->pa;
    }

    public function setPa(?Parcours $pa): self
    {
        $this->pa = $pa;

        return $this;
    }

    public function getTypep(): ?TypeEpreuve
    {
        return $this->typep;
    }

    public function setTypep(?TypeEpreuve $typep): self
    {
        $this->typep = $typep;

        return $this;
    }

    public function getMa(): ?Manifestation
    {
        return $this->ma;
    }

    public function setMa(?Manifestation $ma): self
    {
        $this->ma = $ma;

        return $this;
    }

    /**
     * @return Collection<int, Historique>
     */
    public function getIdHistorique(): Collection
    {
        return $this->idHistorique;
    }

    public function addIdHistorique(Historique $idHistorique): self
    {
        if (!$this->idHistorique->contains($idHistorique)) {
            $this->idHistorique->add($idHistorique);
        }

        return $this;
    }

    public function removeIdHistorique(Historique $idHistorique): self
    {
        $this->idHistorique->removeElement($idHistorique);

        return $this;
    }

}
