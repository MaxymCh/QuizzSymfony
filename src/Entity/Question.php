<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @var \App\Entity\Questionnaire
     *
     * @ORM\ManyToOne(targetEntity="Questionnaire", inversedBy="questions")
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
	 * @return \App\Entity\Questionnaire
	 */
	public function getQuestionnaireid() {
		return $this->questionnaireid;
	}
	
	/**
	 * 
	 * @param \App\Entity\Questionnaire|null $questionnaireid 
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

	    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reponse", mappedBy="questionid", cascade={"persist", "remove"})
     */
    private $reponses;

    public function __construct()
    {
        $this->reponses = new ArrayCollection();
    }

    /**
     * @return Collection|Question[]
     */
    public function getReponses(): Collection
    {
        return $this->reponses;
    }

    public function addReponse(Reponse $reponse): self
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses[] = $reponse;
            $reponse->setQuestionid($this);
        }

        return $this;
    }

    public function removeReponse(Reponse $reponse): self
    {
        if ($this->reponses->removeElement($reponse)) {
            // set the owning side to null (unless already changed)
            if ($reponse->getQuestionid() === $this) {
                $reponse->setQuestionid(null);
            }
        }

        return $this;
    }
}
