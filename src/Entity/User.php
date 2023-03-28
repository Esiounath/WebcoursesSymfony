<?php


namespace App\Entity;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8D93D649F85E0677", columns={"username"})})
 * @ORM\Entity
 */
class User implements UserInterface,PasswordAuthenticatedUserInterface
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
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=180, nullable=false)
     */
    private $username;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="json", nullable=false)
     */
    private $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="day", type="date", nullable=false)
     */
    private $day;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=100, nullable=false)
     */
    private $prenom;

    /**
     * @var bool
     *
     * @ORM\Column(name="sexe", type="boolean", nullable=false)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="epreuve_choisie", type="string", length=100, nullable=false)
     */
    private $epreuveChoisie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="parcours", type="string", length=50, nullable=true)
     */
    private $parcours;

    /**
     * @var string
     *
     * @ORM\Column(name="taille_maillot", type="string", length=100, nullable=false)
     */
    private $tailleMaillot;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_dossard", type="integer", nullable=false)
     */
    private $numeroDossard;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie_age", type="string", length=100, nullable=false)
     */
    private $categorieAge;

    /**
     * @var string
     *
     * @ORM\Column(name="type_epreuve", type="string", length=100, nullable=false)
     */
    private $typeEpreuve;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birth", type="date", nullable=false)
     */
    private $birth;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_epreuve", type="date", nullable=false)
     */
    private $dateEpreuve;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=100, nullable=false)
     */
    private $ip;

    /**
     * @var bool
     *
     * @ORM\Column(name="valide", type="boolean", nullable=false)
     */
    private $valide;
    public function __construct(){
        $this->valide = 0 ;
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->day = new \DateTime();
        $this->day->format('Y-m-d H:i:s');
        $this->roles = ['ROLE_USER'];
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier():string
    {
        return $this->username;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getDay(): ?\DateTimeInterface
    {
        return $this->day;
    }

    public function setDay(\DateTimeInterface $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function isSexe(): ?bool
    {
        return $this->sexe;
    }

    public function setSexe(bool $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getEpreuveChoisie(): ?string
    {
        return $this->epreuveChoisie;
    }

    public function setEpreuveChoisie(string $epreuveChoisie): self
    {
        $this->epreuveChoisie = $epreuveChoisie;

        return $this;
    }

    public function getParcours(): ?string
    {
        return $this->parcours;
    }

    public function setParcours(?string $parcours): self
    {
        $this->parcours = $parcours;

        return $this;
    }

    public function getTailleMaillot(): ?string
    {
        return $this->tailleMaillot;
    }

    public function setTailleMaillot(string $tailleMaillot): self
    {
        $this->tailleMaillot = $tailleMaillot;

        return $this;
    }

    public function getNumeroDossard(): ?int
    {
        return $this->numeroDossard;
    }

    public function setNumeroDossard(int $numeroDossard): self
    {
        $this->numeroDossard = $numeroDossard;

        return $this;
    }

    public function getCategorieAge(): ?string
    {
        return $this->categorieAge;
    }

    public function setCategorieAge(string $categorieAge): self
    {
        $this->categorieAge = $categorieAge;

        return $this;
    }

    public function getTypeEpreuve(): ?string
    {
        return $this->typeEpreuve;
    }

    public function setTypeEpreuve(string $typeEpreuve): self
    {
        $this->typeEpreuve = $typeEpreuve;

        return $this;
    }

    public function getBirth(): ?\DateTimeInterface
    {
        return $this->birth;
    }

    public function setBirth(\DateTimeInterface $birth): self
    {
        $this->birth = $birth;

        return $this;
    }

    public function getDateEpreuve(): ?\DateTimeInterface
    {
        return $this->dateEpreuve;
    }

    public function setDateEpreuve(\DateTimeInterface $dateEpreuve): self
    {
        $this->dateEpreuve = $dateEpreuve;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function isValide(): ?bool
    {
        return $this->valide;
    }

    public function setValide(bool $valide): self
    {
        $this->valide = $valide;

        return $this;
    }


}
