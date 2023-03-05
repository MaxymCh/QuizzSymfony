<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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

    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Question", mappedBy="questionnaireid", cascade={"persist", "remove"})
     */
    private $questions;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }

    /**
     * @return Collection|Question[]
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions[] = $question;
            $question->setQuestionnaire($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        if ($this->questions->removeElement($question)) {
            // set the owning side to null (unless already changed)
            if ($question->getQuestionnaire() === $this) {
                $question->setQuestionnaire(null);
            }
        }

        return $this;
    }

	public function getMaxQuestionOrder() {
		$maxQuestionOrder = null;
		foreach($this->questions as $question) {
			if($maxQuestionOrder === null || $question->getQuestionorder() > $maxQuestionOrder) {
				$maxQuestionOrder = $question->getQuestionorder();
			}
		}
		return $maxQuestionOrder;
	}
	
}
