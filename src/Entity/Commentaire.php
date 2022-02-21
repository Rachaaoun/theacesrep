<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire", indexes={@ORM\Index(name="fkey47", columns={"imgCl"}), @ORM\Index(name="fkey48", columns={"nomcl"}), @ORM\Index(name="fkey60", columns={"idCl"}), @ORM\Index(name="fkey45", columns={"idarticle"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\CommentaireRepository")
 */
class Commentaire
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
     * @ORM\Column(name="contenu", type="text", length=65535, nullable=false)
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_commentaire", type="datetime", nullable=false)
     */
    private $dateCommentaire;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCl", referencedColumnName="idClient")
     * })
     */
    private $idcl;

    /**
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idarticle", referencedColumnName="idarticle")
     * })
     */
    private $idarticle;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="nomcl", referencedColumnName="name")
     * })
     */
    private $nomcl;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imgCl", referencedColumnName="image")
     * })
     */
    private $imgcl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDateCommentaire(): ?\DateTimeInterface
    {
        return $this->dateCommentaire;
    }

    public function setDateCommentaire(\DateTimeInterface $dateCommentaire): self
    {
        $this->dateCommentaire = $dateCommentaire;

        return $this;
    }

    public function getIdcl(): ?Client
    {
        return $this->idcl;
    }

    public function setIdcl(?Client $idcl): self
    {
        $this->idcl = $idcl;

        return $this;
    }

    public function getIdarticle(): ?Article
    {
        return $this->idarticle;
    }

    public function setIdarticle(?Article $idarticle): self
    {
        $this->idarticle = $idarticle;

        return $this;
    }

    public function getNomcl(): ?Client
    {
        return $this->nomcl;
    }

    public function setNomcl(?Client $nomcl): self
    {
        $this->nomcl = $nomcl;

        return $this;
    }

    public function getImgcl(): ?Client
    {
        return $this->imgcl;
    }

    public function setImgcl(?Client $imgcl): self
    {
        $this->imgcl = $imgcl;

        return $this;
    }


}
