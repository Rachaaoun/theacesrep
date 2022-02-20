<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ratings
 *
 * @ORM\Table(name="ratings", indexes={@ORM\Index(name="fkey46", columns={"idar"}), @ORM\Index(name="fkey77", columns={"idcli"}), @ORM\Index(name="fkey33", columns={"nomClient"}), @ORM\Index(name="fkey44", columns={"imgClient"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\RatingsRepository")
 */
class Ratings
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcli", referencedColumnName="idClient")
     * })
     */
    private $idcli;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nomClient", referencedColumnName="name")
     * })
     */
    private $nomclient;

    /**
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idar", referencedColumnName="idarticle")
     * })
     */
    private $idar;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imgClient", referencedColumnName="image")
     * })
     */
    private $imgclient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIdcli(): ?Client
    {
        return $this->idcli;
    }

    public function setIdcli(?Client $idcli): self
    {
        $this->idcli = $idcli;

        return $this;
    }

    public function getNomclient(): ?Client
    {
        return $this->nomclient;
    }

    public function setNomclient(?Client $nomclient): self
    {
        $this->nomclient = $nomclient;

        return $this;
    }

    public function getIdar(): ?Article
    {
        return $this->idar;
    }

    public function setIdar(?Article $idar): self
    {
        $this->idar = $idar;

        return $this;
    }

    public function getImgclient(): ?Client
    {
        return $this->imgclient;
    }

    public function setImgclient(?Client $imgclient): self
    {
        $this->imgclient = $imgclient;

        return $this;
    }


}
