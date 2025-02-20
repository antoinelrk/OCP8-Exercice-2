<?php

namespace App\Form;

use App\Entity\User;
use App\Enum\EmploymentContractEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('first_name')
            ->add('email')
            ->add('employment_started_at', DateType::class, [
                'widget' => 'single_text'
            ])
            ->add('employment_contract', ChoiceType::class, [
                'choices' => [
                    EmploymentContractEnum::CDI->value => EmploymentContractEnum::CDI->value,
                    EmploymentContractEnum::CDD->value => EmploymentContractEnum::CDD->value,
                    EmploymentContractEnum::FREELANCE->value => EmploymentContractEnum::FREELANCE->value
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
