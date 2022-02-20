<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Keywords
 *
 * @ORM\Table(name="keywords")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\KeywordsRepository")
 */
class Keywords
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
     * @ORM\Column(name="games", type="string", length=10, nullable=false)
     */
    private $games;

    /**
     * @var string
     *
     * @ORM\Column(name="element", type="string", length=10, nullable=false)
     */
    private $element;

    /**
     * @var string
     *
     * @ORM\Column(name="tournoi", type="string", length=10, nullable=false)
     */
    private $tournoi;

    /**
     * @var string
     *
     * @ORM\Column(name="livreurs", type="string", length=10, nullable=false)
     */
    private $livreurs;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGames(): ?string
    {
        return $this->games;
    }

    public function setGames(string $games): self
    {
        $this->games = $games;

        return $this;
    }

    public function getElement(): ?string
    {
        return $this->element;
    }

    public function setElement(string $element): self
    {
        $this->element = $element;

        return $this;
    }

    public function getTournoi(): ?string
    {
        return $this->tournoi;
    }

    public function setTournoi(string $tournoi): self
    {
        $this->tournoi = $tournoi;

        return $this;
    }

    public function getLivreurs(): ?string
    {
        return $this->livreurs;
    }

    public function setLivreurs(string $livreurs): self
    {
        $this->livreurs = $livreurs;

        return $this;
    }


}
