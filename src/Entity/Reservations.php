<?php


namespace App\Entity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Reservations
 *
 * @ORM\Table(name="reservations", indexes={@ORM\Index(name="id_article", columns={"id_article"}), @ORM\Index(name="id_coureur", columns={"id_coureur"}), @ORM\Index(name="id_epreuve", columns={"id_epreuve"})})
 * @ORM\Entity
 */
class Reservations
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_reservation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReservation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_reservation", type="date", nullable=true)
     */
    private $dateReservation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="quantite", type="integer", nullable=true)
     */
    private $quantite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle", type="string", length=100, nullable=true)
     */
    private $libelle;

    /**
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_article", referencedColumnName="id_article")
     * })
     */
    private $idArticle;

    /**
     * @var \Coureur
     *
     * @ORM\ManyToOne(targetEntity="Coureur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_coureur", referencedColumnName="co_id")
     * })
     */
    private $idCoureur;

    /**
     * @var \Epreuve
     *
     * @ORM\ManyToOne(targetEntity="Epreuve")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_epreuve", referencedColumnName="ep_id")
     * })
     */
    private $idEpreuve;

    public function getIdReservation(): ?int
    {
        return $this->idReservation;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->dateReservation;
    }

    public function setDateReservation(?\DateTimeInterface $dateReservation): self
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getIdArticle(): ?Article
    {
        return $this->idArticle;
    }

    public function setIdArticle(?Article $idArticle): self
    {
        $this->idArticle = $idArticle;

        return $this;
    }

    public function getIdCoureur(): ?Coureur
    {
        return $this->idCoureur;
    }

    public function setIdCoureur(?Coureur $idCoureur): self
    {
        $this->idCoureur = $idCoureur;

        return $this;
    }

    public function getIdEpreuve(): ?Epreuve
    {
        return $this->idEpreuve;
    }

    public function setIdEpreuve(?Epreuve $idEpreuve): self
    {
        $this->idEpreuve = $idEpreuve;

        return $this;
    }


}
