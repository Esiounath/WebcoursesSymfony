<?php


namespace App\Entity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Manifestation
 *
 * @ORM\Table(name="manifestation", indexes={@ORM\Index(name="ch_id", columns={"ch_id"})})
 * @ORM\Entity
 */
class Manifestation
{
    /**
     * @var int
     *
     * @ORM\Column(name="ma_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $maId;

    /**
     * @var string
     *
     * @ORM\Column(name="ma_nom", type="string", length=50, nullable=false)
     */
    private $maNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ma_lieu", type="string", length=50, nullable=true)
     */
    private $maLieu;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ma_datedeb", type="date", nullable=true)
     */
    private $maDatedeb;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ma_datefin", type="date", nullable=true)
     */
    private $maDatefin;

    /**
     * @var \Championnat
     *
     * @ORM\ManyToOne(targetEntity="Championnat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ch_id", referencedColumnName="ch_id")
     * })
     */
    private $ch;

    public function getMaId(): ?int
    {
        return $this->maId;
    }

    public function getMaNom(): ?string
    {
        return $this->maNom;
    }

    public function setMaNom(string $maNom): self
    {
        $this->maNom = $maNom;

        return $this;
    }

    public function getMaLieu(): ?string
    {
        return $this->maLieu;
    }

    public function setMaLieu(?string $maLieu): self
    {
        $this->maLieu = $maLieu;

        return $this;
    }

    public function getMaDatedeb(): ?\DateTimeInterface
    {
        return $this->maDatedeb;
    }

    public function setMaDatedeb(?\DateTimeInterface $maDatedeb): self
    {
        $this->maDatedeb = $maDatedeb;

        return $this;
    }

    public function getMaDatefin(): ?\DateTimeInterface
    {
        return $this->maDatefin;
    }

    public function setMaDatefin(?\DateTimeInterface $maDatefin): self
    {
        $this->maDatefin = $maDatefin;

        return $this;
    }

    public function getCh(): ?Championnat
    {
        return $this->ch;
    }

    public function setCh(?Championnat $ch): self
    {
        $this->ch = $ch;

        return $this;
    }


}
