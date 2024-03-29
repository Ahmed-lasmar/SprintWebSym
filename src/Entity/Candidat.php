<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Candidat
 *
 * @ORM\Table(name="candidat")
 * @ORM\Entity
 */
class Candidat
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_Can", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCan;

    /**
     * @var string
     *
     * @ORM\Column(name="URL_CV", type="string", length=255, nullable=false)
     */
    private $urlCv;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="D_Post", type="date", nullable=false)
     */
    private $dPost;

    /**
     * @var string
     *
     * @ORM\Column(name="Competence", type="string", length=255, nullable=false)
     */
    private $competence;

    public function getIdCan(): ?int
    {
        return $this->idCan;
    }

    public function getUrlCv(): ?string
    {
        return $this->urlCv;
    }

    public function setUrlCv(string $urlCv): self
    {
        $this->urlCv = $urlCv;

        return $this;
    }

    public function getDPost(): ?\DateTimeInterface
    {
        return $this->dPost;
    }

    public function setDPost(\DateTimeInterface $dPost): self
    {
        $this->dPost = $dPost;

        return $this;
    }

    public function getCompetence(): ?string
    {
        return $this->competence;
    }

    public function setCompetence(string $competence): self
    {
        $this->competence = $competence;

        return $this;
    }


}
