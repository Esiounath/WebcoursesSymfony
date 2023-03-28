<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * TShirt
 *
 * @ORM\Table(name="t_shirt")
 * @ORM\Entity
 */
class TShirt
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="taille", type="string", length=50, nullable=true)
     */
    private $taille;

    /**
     * @var string|null
     *
     * @ORM\Column(name="couleur", type="string", length=50, nullable=true)
     */
    private $couleur;

    /**
     * @var \Article
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_article", referencedColumnName="id_article")
     * })
     */
    private $idArticle;

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(?string $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;

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


}
