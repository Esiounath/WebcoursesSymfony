<?php


namespace App\Entity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Log
 *
 * @ORM\Table(name="Log")
 * @ORM\Entity
 */
class Log
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="jour", type="date", nullable=true)
     */
    private $jour;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IP", type="string", length=100, nullable=true)
     */
    private $ip;

    /**
     * @var string|null
     *
     * @ORM\Column(name="utilisateur", type="string", length=100, nullable=true)
     */
    private $utilisateur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=200, nullable=true)
     */
    private $password;
    public function __construct(){
        $this->jour = new \DateTime();
        $this->jour->format('Y-m-d h:m:s');
        $this->ip = $_SERVER['REMOTE_ADDR'];
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?\DateTimeInterface
    {
        return $this->jour;
    }

    public function setJour(?\DateTimeInterface $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getUtilisateur(): ?string
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?string $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }


}
