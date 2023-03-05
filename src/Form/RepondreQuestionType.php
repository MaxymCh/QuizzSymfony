<?php


namespace App\Form;

use App\Entity\Question;
use App\Entity\RepondreQuestion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RepondreQuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $question = $options['answer'];
        
        if ($question->getQuestionType() === 'radio') {
            $builder->add('answer', ChoiceType::class, [
                'choices' => $question->getReponseString(),
                'expanded' => true,
                'multiple' => false,
            ]);
        } elseif ($question->getQuestionType() === 'checkbox') {
            $builder->add('answer', ChoiceType::class, [
                'choices' => $question->getReponseString(),
                'expanded' => true,
                'multiple' => true,
            ]);
        } elseif ($question->getQuestionType() === 'dropdown') {
            $builder->add('answer', ChoiceType::class, [
                'choices' => $question->getReponseString(),
                'expanded' => false,
                'multiple' => false,
            ]);
        } elseif ($question->getQuestionType() === 'text') {
            $builder->add('answer', TextType::class);
        }
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'answer' => null,
        ]);
    }

}
