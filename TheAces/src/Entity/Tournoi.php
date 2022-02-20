<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tournoi
 *
 * @ORM\Table(name="tournoi", indexes={@ORM\Index(name="fkey8", columns={"idSponsor"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\TournoiRepository")
 */
class Tournoi
{
    /**
     * @var int
     *@Assert\Positive
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     */
    private $id;

    /**
     * @var string
     * @Assert\NotNull
     * @Assert\NotBlank
     * @ORM\Column(name="name", type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Debut", type="date", nullable=false)
     */
    private $dateDebut;

    /**
     * @var \DateTime

     * @ORM\Column(name="Date_Fin", type="date", nullable=false)
     */
    private $dateFin;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\NotNull
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var float
     *@Assert\NotBlank
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string|null
     *
     * @Assert\NotBlank
     * @ORM\Column(name="image", type="string", length=30,  nullable=true, options={"default"="NULL"})
     */
    private $image;

    /**
     * @var \Sponsors
     *@Assert\NotBlank
     * @ORM\ManyToOne(targetEntity="Sponsors")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idSponsor", referencedColumnName="id")
     * })
     */
    private $idsponsor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }
    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }
    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
    /**
     * @param string|null $description
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
    /**
     * @return int|null
     */
    public function getPrix(): ?float
    {
        return $this->prix;
    }
    /**
     * @param int|null $prix
     */
    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }
    /**
     * @return string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }
    /**
     * @return int|null
     */
    public function getIdsponsor(): ?Sponsors
    {
        return $this->idsponsor;
    }
    /**
     * @param int|null $idsponsor
     */
    public function setIdsponsor(?Sponsors $idsponsor): self
    {
        $this->idsponsor = $idsponsor;

        return $this;
    }


}
