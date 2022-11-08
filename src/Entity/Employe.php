<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Employe
 *
 * @ORM\Table(name="employe")
 * @ORM\Entity
 */
class Employe
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id_per", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_embauche", type="date", nullable=false)
     */
    private $dateEmbauche;

    /**
     * @var string
     *
     * @ORM\Column(name="Grade", type="string", length=255, nullable=false)
     */
    private $grade;

    /**
     * @var string
     *
     * @ORM\Column(name="Equipe", type="string", length=255, nullable=false)
     */
    private $equipe;

    public function getIdPer(): ?int
    {
        return $this->idPer;
    }

    public function getDateEmbauche(): ?\DateTimeInterface
    {
        return $this->dateEmbauche;
    }

    public function setDateEmbauche(\DateTimeInterface $dateEmbauche): self
    {
        $this->dateEmbauche = $dateEmbauche;

        return $this;
    }

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getEquipe(): ?string
    {
        return $this->equipe;
    }

    public function setEquipe(string $equipe): self
    {
        $this->equipe = $equipe;

        return $this;
    }


}
