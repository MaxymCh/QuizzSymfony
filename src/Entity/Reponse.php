<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse
 *
 * @ORM\Table(name="REPONSE", indexes={@ORM\Index(name="questionID", columns={"questionID"})})
 * @ORM\Entity
 */
class Reponse
{
    /**
     * @var int
     *
     * @ORM\Column(name="reponseID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reponseid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reponseText", type="string", length=255, nullable=true)
     */
    private $reponsetext;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="correct", type="boolean", nullable=true)
     */
    private $correct;

    /**
     * @var \App\Entity\Question
     *
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="reponses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="questionID", referencedColumnName="questionID")
     * })
     */
    private $questionid;



	/**
	 * 
	 * @return int
	 */
	public function getReponseid() {
		return $this->reponseid;
	}
	
	/**
	 * 
	 * @param int $reponseid 
	 * @return self
	 */
	public function setReponseid($reponseid): self {
		$this->reponseid = $reponseid;
		return $this;
	}
	
	/**
	 * 
	 * @return string|null
	 */
	public function getReponsetext() {
		return $this->reponsetext;
	}
	
	/**
	 * 
	 * @param string|null $reponsetext 
	 * @return self
	 */
	public function setReponsetext($reponsetext): self {
		$this->reponsetext = $reponsetext;
		return $this;
	}
	
	/**
	 * 
	 * @return bool|null
	 */
	public function getCorrect() {
		return $this->correct;
	}
	
	/**
	 * 
	 * @param bool|null $correct 
	 * @return self
	 */
	public function setCorrect($correct): self {
		$this->correct = $correct;
		return $this;
	}
	
	/**
	 * 
	 * @return \App\Entity\Question
	 */
	public function getQuestion() {
		return $this->questionid;
	}
	
	/**
	 * 
	 * @param \App\Entity\Question|null $questionid 
	 * @return self
	 */
	public function setQuestion($questionid): self {
		$this->questionid = $questionid;
		return $this;
	}

    public function __toString()
    {
        return "Réponse ID : ".strval($this->reponseid)." ".$this->reponsetext;
    }
}
