<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_article", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idArticle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type_article", type="string", length=50, nullable=true)
     */
    private $typeArticle;

    /**
     * @var int|null
     *
     * @ORM\Column(name="quantite", type="integer", nullable=true)
     */
    private $quantite;

    public function getIdArticle(): ?int
    {
        return $this->idArticle;
    }

    public function getTypeArticle(): ?string
    {
        return $this->typeArticle;
    }

    public function setTypeArticle(?string $typeArticle): self
    {
        $this->typeArticle = $typeArticle;

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


}
