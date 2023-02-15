<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Questionnaire
 *
 * @ORM\Table(name="QUESTIONNAIRE", uniqueConstraints={@ORM\UniqueConstraint(name="questionnaireName", columns={"questionnaireName"})})
 * @ORM\Entity
 */
class Questionnaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="questionnaireID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $questionnaireid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="questionnaireName", type="string", length=255, nullable=true)
     */
    private $questionnairename;

    /**
     * @var string|null
     *
     * @ORM\Column(name="questionnaireDescription", type="text", length=65535, nullable=true)
     */
    private $questionnairedescription;



	/**
	 * 
	 * @return int
	 */
	public function getQuestionnaireid() {
		return $this->questionnaireid;
	}
	
	/**
	 * 
	 * @param int $questionnaireid 
	 * @return self
	 */
	public function setQuestionnaireid($questionnaireid): self {
		$this->questionnaireid = $questionnaireid;
		return $this;
	}
	
	/**
	 * 
	 * @return string|null
	 */
	public function getQuestionnairename() {
		return $this->questionnairename;
	}
	
	/**
	 * 
	 * @param string|null $questionnairename 
	 * @return self
	 */
	public function setQuestionnairename($questionnairename): self {
		$this->questionnairename = $questionnairename;
		return $this;
	}
	
	/**
	 * 
	 * @return string|null
	 */
	public function getQuestionnairedescription() {
		return $this->questionnairedescription;
	}
	
	/**
	 * 
	 * @param string|null $questionnairedescription 
	 * @return self
	 */
	public function setQuestionnairedescription($questionnairedescription): self {
		$this->questionnairedescription = $questionnairedescription;
		return $this;
	}

    public function __toString()
    {
        return "Questionnaire ID : ".strval($this->questionnaireid)." ".$this->questionnairename;
    }
}
