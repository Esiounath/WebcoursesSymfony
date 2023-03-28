<?php


namespace App\Entity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Reglement
 *
 * @ORM\Table(name="reglement", indexes={@ORM\Index(name="typreg_code", columns={"typreg_code"})})
 * @ORM\Entity
 */
class Reglement
{
    /**
     * @var int
     *
     * @ORM\Column(name="reg_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $regId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="reg_date_reglement", type="date", nullable=true)
     */
    private $regDateReglement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reg_montant_du", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $regMontantDu;

    /**
     * @var \TypeReglement
     *
     * @ORM\ManyToOne(targetEntity="TypeReglement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="typreg_code", referencedColumnName="typreg_code")
     * })
     */
    private $typregCode;

    public function getRegId(): ?int
    {
        return $this->regId;
    }

    public function getRegDateReglement(): ?\DateTimeInterface
    {
        return $this->regDateReglement;
    }

    public function setRegDateReglement(?\DateTimeInterface $regDateReglement): self
    {
        $this->regDateReglement = $regDateReglement;

        return $this;
    }

    public function getRegMontantDu(): ?string
    {
        return $this->regMontantDu;
    }

    public function setRegMontantDu(?string $regMontantDu): self
    {
        $this->regMontantDu = $regMontantDu;

        return $this;
    }

    public function getTypregCode(): ?TypeReglement
    {
        return $this->typregCode;
    }

    public function setTypregCode(?TypeReglement $typregCode): self
    {
        $this->typregCode = $typregCode;

        return $this;
    }


}
