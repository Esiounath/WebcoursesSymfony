<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Parcours
 *
 * @ORM\Table(name="parcours")
 * @ORM\Entity
 */
class Parcours
{
    /**
     * @var int
     *
     * @ORM\Column(name="pa_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $paId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pa_nom_parcours", type="string", length=30, nullable=true)
     */
    private $paNomParcours;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pa_distance", type="integer", nullable=true)
     */
    private $paDistance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pa_point_depart", type="string", length=50, nullable=true)
     */
    private $paPointDepart;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pa_point_arrivee", type="string", length=50, nullable=true)
     */
    private $paPointArrivee;

    public function getPaId(): ?int
    {
        return $this->paId;
    }

    public function getPaNomParcours(): ?string
    {
        return $this->paNomParcours;
    }

    public function setPaNomParcours(?string $paNomParcours): self
    {
        $this->paNomParcours = $paNomParcours;

        return $this;
    }

    public function getPaDistance(): ?int
    {
        return $this->paDistance;
    }

    public function setPaDistance(?int $paDistance): self
    {
        $this->paDistance = $paDistance;

        return $this;
    }

    public function getPaPointDepart(): ?string
    {
        return $this->paPointDepart;
    }

    public function setPaPointDepart(?string $paPointDepart): self
    {
        $this->paPointDepart = $paPointDepart;

        return $this;
    }

    public function getPaPointArrivee(): ?string
    {
        return $this->paPointArrivee;
    }

    public function setPaPointArrivee(?string $paPointArrivee): self
    {
        $this->paPointArrivee = $paPointArrivee;

        return $this;
    }


}
