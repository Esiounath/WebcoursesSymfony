<?php


namespace App\Entity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Championnat
 *
 * @ORM\Table(name="championnat")
 * @ORM\Entity
 */
class Championnat
{
    /**
     * @var int
     *
     * @ORM\Column(name="ch_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $chId;

    /**
     * @var string
     *
     * @ORM\Column(name="ch_nom", type="string", length=50, nullable=false)
     */
    private $chNom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ch_année", type="date", nullable=true)
     */
    private $chAnnée;

    public function getChId(): ?int
    {
        return $this->chId;
    }

    public function getChNom(): ?string
    {
        return $this->chNom;
    }

    public function setChNom(string $chNom): self
    {
        $this->chNom = $chNom;

        return $this;
    }

    public function getChAnnée(): ?\DateTimeInterface
    {
        return $this->chAnnée;
    }

    public function setChAnnée(?\DateTimeInterface $chAnnée): self
    {
        $this->chAnnée = $chAnnée;

        return $this;
    }


}
