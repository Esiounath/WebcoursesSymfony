<?php


namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * DenreLiquide
 *
 * @ORM\Table(name="denre_liquide")
 * @ORM\Entity
 */
class DenreLiquide
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="volume", type="integer", nullable=true)
     */
    private $volume;

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

    public function getVolume(): ?int
    {
        return $this->volume;
    }

    public function setVolume(?int $volume): self
    {
        $this->volume = $volume;

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
