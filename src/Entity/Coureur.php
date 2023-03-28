<?php


namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Coureur
 *
 * @ORM\Table(name="coureur")
 * @ORM\Entity
 */
class Coureur
{
    /**
     * @var int
     *
     * @ORM\Column(name="co_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $coId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="co_nom", type="string", length=50, nullable=true)
     */
    private $coNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="co_prenom", type="string", length=50, nullable=true)
     */
    private $coPrenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="co_adresse", type="string", length=100, nullable=true)
     */
    private $coAdresse;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="co_datenais", type="date", nullable=true)
     */
    private $coDatenais;

    /**
     * @var string|null
     *
     * @ORM\Column(name="co_nationalite", type="string", length=50, nullable=true)
     */
    private $coNationalite;

    /**
     * @var int|null
     *
     * @ORM\Column(name="co_sexe", type="integer", nullable=true)
     */
    private $coSexe;

    /**
     * @var int|null
     *
     * @ORM\Column(name="co_numtel", type="integer", nullable=true)
     */
    private $coNumtel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="co_email", type="string", length=50, nullable=true)
     */
    private $coEmail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="co_statut", type="string", length=1, nullable=true)
     */
    private $coStatut;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Club", inversedBy="co")
     * @ORM\JoinTable(name="adherer",
     *   joinColumns={
     *     @ORM\JoinColumn(name="co_id", referencedColumnName="co_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="cl_id", referencedColumnName="cl_id")
     *   }
     * )
     */
    private $cl = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cl = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getCoId(): ?int
    {
        return $this->coId;
    }

    public function getCoNom(): ?string
    {
        return $this->coNom;
    }

    public function setCoNom(?string $coNom): self
    {
        $this->coNom = $coNom;

        return $this;
    }

    public function getCoPrenom(): ?string
    {
        return $this->coPrenom;
    }

    public function setCoPrenom(?string $coPrenom): self
    {
        $this->coPrenom = $coPrenom;

        return $this;
    }

    public function getCoAdresse(): ?string
    {
        return $this->coAdresse;
    }

    public function setCoAdresse(?string $coAdresse): self
    {
        $this->coAdresse = $coAdresse;

        return $this;
    }

    public function getCoDatenais(): ?\DateTimeInterface
    {
        return $this->coDatenais;
    }

    public function setCoDatenais(?\DateTimeInterface $coDatenais): self
    {
        $this->coDatenais = $coDatenais;

        return $this;
    }

    public function getCoNationalite(): ?string
    {
        return $this->coNationalite;
    }

    public function setCoNationalite(?string $coNationalite): self
    {
        $this->coNationalite = $coNationalite;

        return $this;
    }

    public function getCoSexe(): ?int
    {
        return $this->coSexe;
    }

    public function setCoSexe(?int $coSexe): self
    {
        $this->coSexe = $coSexe;

        return $this;
    }

    public function getCoNumtel(): ?int
    {
        return $this->coNumtel;
    }

    public function setCoNumtel(?int $coNumtel): self
    {
        $this->coNumtel = $coNumtel;

        return $this;
    }

    public function getCoEmail(): ?string
    {
        return $this->coEmail;
    }

    public function setCoEmail(?string $coEmail): self
    {
        $this->coEmail = $coEmail;

        return $this;
    }

    public function getCoStatut(): ?string
    {
        return $this->coStatut;
    }

    public function setCoStatut(?string $coStatut): self
    {
        $this->coStatut = $coStatut;

        return $this;
    }

    /**
     * @return Collection<int, Club>
     */
    public function getCl(): Collection
    {
        return $this->cl;
    }

    public function addCl(Club $cl): self
    {
        if (!$this->cl->contains($cl)) {
            $this->cl->add($cl);
        }

        return $this;
    }

    public function removeCl(Club $cl): self
    {
        $this->cl->removeElement($cl);

        return $this;
    }

}
