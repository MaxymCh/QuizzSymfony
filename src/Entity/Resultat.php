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



	/**
	 * 
	 * @return int
	 */
	public function getResultatid() {
		return $this->resultatid;
	}
	
	/**
	 * 
	 * @param int $resultatid 
	 * @return self
	 */
	public function setResultatid($resultatid): self {
		$this->resultatid = $resultatid;
		return $this;
	}
	
	/**
	 * 
	 * @return \DateTime|null
	 */
	public function getQuestionnairedate() {
		return $this->questionnairedate;
	}
	
	/**
	 * 
	 * @param \DateTime|null $questionnairedate 
	 * @return self
	 */
	public function setQuestionnairedate($questionnairedate): self {
		$this->questionnairedate = $questionnairedate;
		return $this;
	}
	
	/**
	 * 
	 * @return int|null
	 */
	public function getScore() {
		return $this->score;
	}
	
	/**
	 * 
	 * @param int|null $score 
	 * @return self
	 */
	public function setScore($score): self {
		$this->score = $score;
		return $this;
	}
	
	/**
	 * 
	 * @return \App\Entity\User
	 */
	public function getUserid() {
		return $this->userid;
	}
	
	/**
	 * 
	 * @param \App\Entity\User $userid 
	 * @return self
	 */
	public function setUserid($userid): self {
		$this->userid = $userid;
		return $this;
	}
	
	/**
	 * 
	 * @return \App\Entity\Questionnaire
	 */
	public function getQuestionnaireid() {
		return $this->questionnaireid;
	}
	
	/**
	 * 
	 * @param \App\Entity\Questionnaire $questionnaireid 
	 * @return self
	 */
	public function setQuestionnaireid($questionnaireid): self {
		$this->questionnaireid = $questionnaireid;
		return $this;
	}
}
