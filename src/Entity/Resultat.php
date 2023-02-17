<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resultat
 *
 * @ORM\Table(name="RESULTAT", indexes={@ORM\Index(name="userID", columns={"userID"}), @ORM\Index(name="questionnaireID", columns={"questionnaireID"})})
 * @ORM\Entity
 */
class Resultat
{
    /**
     * @var int
     *
     * @ORM\Column(name="resultatID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $resultatid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="questionnaireDate", type="date", nullable=true)
     */
    private $questionnairedate;

    /**
     * @var int|null
     *
     * @ORM\Column(name="score", type="integer", nullable=true)
     */
    private $score;

    /**
     * @var \App\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userID", referencedColumnName="userID")
     * })
     */
    private $userid;

    /**
     * @var \App\Entity\Questionnaire
     *
     * @ORM\ManyToOne(targetEntity="Questionnaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="questionnaireID", referencedColumnName="questionnaireID")
     * })
     */
    private $questionnaireid;

    public function __toString()
    {
        return "Resultat ID : ".strval($this->resultatid)." ".$this->userid;
    }


}
