<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * Sponsors
 *
 * @ORM\Table(name="sponsors")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="App\Repository\SponsorsRepository")
 */
class Sponsors
{
    /**
     * @var int
     * @Assert\NotBlank
     *@Assert\Positive
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;

    /**
     * @var string
     * @Assert\NotBlank
     ** @Assert\NotNull
     * @ORM\Column(name="name", type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\NotNull
     * @ORM\Column(name="logo", type="string", length=30, nullable=false)
     */
    private $logo;

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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }
    public function __toString()
    {
        return $this->id;
    }

}
