<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reparation
 *
 * @ORM\Table(name="reparation")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ReparationRepository")
 */
class Reparation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idRep", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrep;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="delai", type="date", nullable=false)
     */
    private $delai;

    public function getIdrep(): ?int
    {
        return $this->idrep;
    }

    public function getDelai(): ?\DateTimeInterface
    {
        return $this->delai;
    }

    public function setDelai(\DateTimeInterface $delai): self
    {
        $this->delai = $delai;

        return $this;
    }


}
