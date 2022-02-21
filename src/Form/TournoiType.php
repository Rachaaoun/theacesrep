<?php

namespace App\Form;

use App\Entity\Tournoi;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class TournoiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'attr' => ['class' => 'form-control' , 'placeholder' => '',
                    ]
            ])
            ->add('dateDebut',DateType::class,[
                'attr' => ['class' => 'form-control' , 'placeholder' => '',
                    ]
            ])
            ->add('dateFin',DateType::class,[
                'attr' => ['class' => 'form-control' , 'placeholder' => '',
                    ]
            ])
            ->add('description',TextType::class,[
                'attr' => ['class' => 'form-control' , 'placeholder' => '',
                    ]
            ])
            ->add('prix',IntegerType::class,[
                'attr' => ['class' => 'form-control' , 'placeholder' => '',
                    ]
            ])
            ->add('nbparticipant',IntegerType::class,[
                'attr' => ['class' => 'form-control' , 'placeholder' => '',
                    ]
            ])
            ->add('image',FileType::class,[
                'data_class' => null,
                'attr' => ['class' => 'form-control' 
                    ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tournoi::class,
        ]);
    }
}
