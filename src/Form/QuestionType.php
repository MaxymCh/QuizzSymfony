<?php

namespace App\Form;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;


class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('questiontext')
            ->add('questiontype')
            ->add('questionorder')
            ->add('questionnaire_id', HiddenType::class, [
                'data' => $options['questionnaire_id'], // Pré-remplit le champ avec l'ID du questionnaire transmis en option
            ])
            //->add('questionnaireid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
            'questionnaire_id' => null, // Définit la valeur par défaut de l'option questionnaire_id à null
        ]);
    }
}
