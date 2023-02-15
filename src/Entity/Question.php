<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Questionnaire;

/**
 * Question
 *
 * @ORM\Table(name="QUESTION", indexes={@ORM\Index(name="questionnaireID", columns={"questionnaireID"})})
 * @ORM\Entity
 */
class Question
{
    /**
     * @var int
     *
     * @ORM\Column(name="questionID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $questionid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="questionText", type="string", length=255, nullable=true)
     */
    private $questiontext;

    /**
     * @var string|null
     *
     * @ORM\Column(name="questionType", type="string", length=30, nullable=true)
     */
    private $questiontype;

    /**
     * @var int|null
     *
     * @ORM\Column(name="questionOrder", type="integer", nullable=true)
     */
    private $questionorder;

    /**
     * @var \Questionnaire
     *
     * @ORM\ManyToOne(targetEntity="Questionnaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="questionnaireID", referencedColumnName="questionnaireID")
     * })
     */
    private $questionnaireid;



	/**
	 * 
	 * @return int
	 */
	public function getQuestionid() {
		return $this->questionid;
	}
	
	/**
	 * 
	 * @param int $questionid 
	 * @return self
	 */
	public function setQuestionid($questionid): self {
		$this->questionid = $questionid;
		return $this;
	}
	
	/**
	 * 
	 * @return string|null
	 */
	public function getQuestiontext() {
		return $this->questiontext;
	}
	
	/**
	 * 
	 * @param string|null $questiontext 
	 * @return self
	 */
	public function setQuestiontext($questiontext): self {
		$this->questiontext = $questiontext;
		return $this;
	}
	
	/**
	 * 
	 * @return string|null
	 */
	public function getQuestiontype() {
		return $this->questiontype;
	}
	
	/**
	 * 
	 * @param string|null $questiontype 
	 * @return self
	 */
	public function setQuestiontype($questiontype): self {
		$this->questiontype = $questiontype;
		return $this;
	}
	
	/**
	 * 
	 * @return int|null
	 */
	public function getQuestionorder() {
		return $this->questionorder;
	}
	
	/**
	 * 
	 * @param int|null $questionorder 
	 * @return self
	 */
	public function setQuestionorder($questionorder): self {
		$this->questionorder = $questionorder;
		return $this;
	}
	
	/**
	 * 
	 * @return \Questionnaire
	 */
	public function getQuestionnaireid() {
		return $this->questionnaireid;
	}
	
	/**
	 * 
	 * @param \Questionnaire $questionnaireid 
	 * @return self
	 */
	public function setQuestionnaireid($questionnaireid): self {
		$this->questionnaireid = $questionnaireid;
		return $this;
	}

    public function __toString()
    {
        return "Question ID : ".strval($this->questionid)." ".$this->questiontext;
    }
}
