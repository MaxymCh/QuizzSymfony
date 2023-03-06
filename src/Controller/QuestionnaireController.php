<?php

namespace App\Controller;

use App\Entity\Question;
use App\Entity\Questionnaire;
use App\Entity\RepondreQuestion;
use App\Form\QuestionnaireType;

use App\Form\RepondreQuestionType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/questionnaire')]
class QuestionnaireController extends AbstractController
{
    #[Route('/', name: 'app_questionnaire_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $questionnaires = $entityManager
            ->getRepository(Questionnaire::class)
            ->findAll();

        return $this->render('questionnaire/index.html.twig', [
            'questionnaires' => $questionnaires,
        ]);
    }

    #[Route('/new', name: 'app_questionnaire_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $questionnaire = new Questionnaire();
        $form = $this->createForm(QuestionnaireType::class, $questionnaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($questionnaire);
            $entityManager->flush();

            return $this->redirectToRoute('app_questionnaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('questionnaire/new.html.twig', [
            'questionnaire' => $questionnaire,
            'form' => $form,
        ]);
    }

    #[Route('/{questionnaireid}', name: 'app_questionnaire_show', methods: ['GET'])]
    public function show(Questionnaire $questionnaire): Response
    {
        

        return $this->render('questionnaire/show.html.twig', [
            'questionnaire' => $questionnaire,
        ]);
    }

    #[Route('/{questionnaireid}/edit', name: 'app_questionnaire_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Questionnaire $questionnaire, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(QuestionnaireType::class, $questionnaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_questionnaire_index', [], Response::HTTP_SEE_OTHER);
        }

        $questions = $questionnaire->getQuestions();
        return $this->renderForm('questionnaire/edit.html.twig', [
            'questionnaire' => $questionnaire,
            'form' => $form,
            'questions' => $questions,
        ]);
    }

    #[Route('/{questionnaireid}', name: 'app_questionnaire_delete', methods: ['POST'])]
    public function delete(Request $request, Questionnaire $questionnaire, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$questionnaire->getQuestionnaireid(), $request->request->get('_token'))) {
            $entityManager->remove($questionnaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_questionnaire_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/{questionnaireid}/repondre/{indiceQuestion}', name: 'app_questionnaire_repondre', methods: ['GET', 'POST'])]
    public function repondre(Questionnaire $questionnaire, Request $request, int $indiceQuestion): Response
    {

        // Récupération des questions du questionnaire
        $questions = $questionnaire->getQuestions();
        // Si l'indice de la question est supérieur ou égal au nombre de questions,
        // alors on a répondu à toutes les questions, on peut calculer le score
        if ($indiceQuestion >= count($questions)) {
            // TODO : Calcul du score
            
            return $this->redirectToRoute('app_questionnaire_index');
        }
        
        // Récupération de la question correspondant à l'indice donné
        $question = $questions[$indiceQuestion];

        // Création du formulaire pour répondre à la question
        $answer = new RepondreQuestion();
        $answer->setQuestion($question);
        $form = $this->createForm(RepondreQuestionType::class, $answer, ['answer' => $question]);
        $form->handleRequest($request);
        \Doctrine\Common\Util\Debug::dump("Testttouu");
        if ($form->isSubmitted() && $form->isValid()) {
            \Doctrine\Common\Util\Debug::dump($indiceQuestion);
            \Doctrine\Common\Util\Debug::dump("Testtt");
            // Sauvegarde de la réponse à la question
            // Redirection vers la question suivante
            $indiceQuestion += 1;
            return $this->redirectToRoute('app_questionnaire_repondre', [
            'questionnaireid' => $questionnaire->getQuestionnaireid(),
            'indiceQuestion' => $indiceQuestion,
            ]);
        }

        return $this->render('questionnaire/repondre.html.twig', [
            'questionnaire' => $questionnaire,
            'question' => $question,
            'questions' => $questions,
            'questionIndex' => $indiceQuestion,
            'form' => $form->createView(),
        ]);
    }


}