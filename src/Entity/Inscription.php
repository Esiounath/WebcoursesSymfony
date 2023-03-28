<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Inscription
 *
 * @ORM\Table(name="inscription")
 * @ORM\Entity
 */
class Inscription
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
     * @var string|null
     *
     * @ORM\Column(name="day", type="string", length=50, nullable=true)
     */
    private $day;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=100, nullable=false)
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sexe", type="string", length=6, nullable=true)
     */
    private $sexe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="epreuve_choisie", type="string", length=80, nullable=true)
     */
    private $epreuveChoisie;

    /**
     * @var string|null
     *
     * @ORM\Column(name="parcours", type="string", length=80, nullable=true)
     */
    private $parcours;

    /**
     * @var string|null
     *
     * @ORM\Column(name="taille_maillot", type="string", length=8, nullable=true)
     */
    private $tailleMaillot;

    /**
     * @var int|null
     *
     * @ORM\Column(name="temps_annoncer", type="integer", nullable=true)
     */
    private $tempsAnnoncer;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numero_dossard", type="integer", nullable=true)
     */
    private $numeroDossard;

    /**
     * @var string|null
     *
     * @ORM\Column(name="categorie_age", type="string", length=80, nullable=true)
     */
    private $categorieAge;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type_epreuve", type="string", length=80, nullable=true)
     */
    private $typeEpreuve;

    /**
     * @var string|null
     *
     * @ORM\Column(name="birth", type="string", length=80, nullable=true)
     */
    private $birth;

    /**
     * @var string|null
     *
     * @ORM\Column(name="date_epreuve", type="string", length=80, nullable=true)
     */
    private $dateEpreuve;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IP", type="string", length=100, nullable=true)
     */
    private $ip;

    /**
     * @var int|null
     *
     * @ORM\Column(name="valide", type="integer", nullable=true)
     */
    private $valide;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mot_de_passe", type="string", length=120, nullable=true)
     */
    private $motDePasse;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identifiant", type="string", length=120, nullable=true)
     */
    private $identifiant;


}
