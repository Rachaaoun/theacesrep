<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livraison
 *
 * @ORM\Table(name="livraison", indexes={@ORM\Index(name="fkey4", columns={"cinLivreur"}), @ORM\Index(name="fkey7", columns={"adresseClient"}), @ORM\Index(name="fkey5", columns={"idClient"}), @ORM\Index(name="fkey6", columns={"idProd"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\LivraisonRepository")
 */
class Livraison
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
     * @ORM\Column(name="method", type="string", length=20, nullable=false)
     */
    private $method;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="adresseClient", referencedColumnName="adresse")
     * })
     */
    private $adresseclient;

    /**
     * @var \Livreur
     *
     * @ORM\ManyToOne(targetEntity="Livreur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cinLivreur", referencedColumnName="cin")
     * })
     */
    private $cinlivreur;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProd", referencedColumnName="id")
     * })
     */
    private $idprod;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="idClient")
     * })
     */
    private $idclient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMethod(): ?string
    {
        return $this->method;
    }

    public function setMethod(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function getAdresseclient(): ?Client
    {
        return $this->adresseclient;
    }

    public function setAdresseclient(?Client $adresseclient): self
    {
        $this->adresseclient = $adresseclient;

        return $this;
    }

    public function getCinlivreur(): ?Livreur
    {
        return $this->cinlivreur;
    }

    public function setCinlivreur(?Livreur $cinlivreur): self
    {
        $this->cinlivreur = $cinlivreur;

        return $this;
    }

    public function getIdprod(): ?Produit
    {
        return $this->idprod;
    }

    public function setIdprod(?Produit $idprod): self
    {
        $this->idprod = $idprod;

        return $this;
    }

    public function getIdclient(): ?Client
    {
        return $this->idclient;
    }

    public function setIdclient(?Client $idclient): self
    {
        $this->idclient = $idclient;

        return $this;
    }


}
