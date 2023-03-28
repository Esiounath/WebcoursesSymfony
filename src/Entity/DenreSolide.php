<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * DenreSolide
 *
 * @ORM\Table(name="denre_solide")
 * @ORM\Entity
 */
class DenreSolide
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="poids", type="integer", nullable=true)
     */
    private $poids;

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

    public function getPoids(): ?int
    {
        return $this->poids;
    }

    public function setPoids(?int $poids): self
    {
        $this->poids = $poids;

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
