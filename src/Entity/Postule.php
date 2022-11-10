<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Postule
 *
 * @ORM\Table(name="postule", indexes={@ORM\Index(name="Id_Can", columns={"Id_Can"}), @ORM\Index(name="Id_Off", columns={"Id_Off"})})
 * @ORM\Entity
 */
class Postule
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_Post", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPost;

    /**
     * @var int
     *
     * @ORM\Column(name="Id_Can", type="integer", nullable=false)
     */
    private $idCan;

    /**
     * @var int
     *
     * @ORM\Column(name="Id_Off", type="integer", nullable=false)
     */
    private $idOff;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Post", type="date", nullable=false)
     */
    private $datePost;

    /**
     * @var string
     *
     * @ORM\Column(name="Etat_Post", type="string", length=255, nullable=false)
     */
    private $etatPost;

    public function getIdPost(): ?int
    {
        return $this->idPost;
    }

    public function getIdCan(): ?int
    {
        return $this->idCan;
    }

    public function setIdCan(int $idCan): self
    {
        $this->idCan = $idCan;

        return $this;
    }

    public function getIdOff(): ?int
    {
        return $this->idOff;
    }

    public function setIdOff(int $idOff): self
    {
        $this->idOff = $idOff;

        return $this;
    }

    public function getDatePost(): ?\DateTimeInterface
    {
        return $this->datePost;
    }

    public function setDatePost(\DateTimeInterface $datePost): self
    {
        $this->datePost = $datePost;

        return $this;
    }

    public function getEtatPost(): ?string
    {
        return $this->etatPost;
    }

    public function setEtatPost(string $etatPost): self
    {
        $this->etatPost = $etatPost;

        return $this;
    }


}
