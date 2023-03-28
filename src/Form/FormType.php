<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Epreuve;
use App\Entity\Categorie;
use App\Entity\Parcours;
use App\Entity\TypeEpreuve;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\Persistence\ManagerRegistry;
class FormType extends AbstractType
{
    private $entityManager;
    private $doctrine;

    public function __construct(EntityManagerInterface $entityManager,ManagerRegistry $doctrine)
    {
        $this->entityManager = $entityManager;
        $this->doctrine = $doctrine;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username',TextType::class,[
                'label' => 'Identifiant',
                'attr' => [
                    'placeholder' => 'Entrez un nom d\'utilisateur ?'
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => "/^([0-9])*([A-Z]*)([a-z]){8,}(\S)?([0-9])+$/",
                        'message' => 'Invalid username format.'
                        ])
                ]
            ])//^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$
            ->add('password',RepeatedType::class,[
                'type'=>PasswordType::class,
                'invalid_message' => 'Le mot de passe et la confirmation doivent être identique !',
                'label' => 'Mot de Passe',
                'first_options'  => ['label' => 'Password',
            'attr'=>[
                'placeholder' => 'Entrez votre mot de passe ?'
            ]
            ],
                'second_options' => ['label' => 'Repeat Password',  'attr'=>[
                    'placeholder' => 'Confirmer votre mot de passe ?'
                ]
            ],
                'required' => true,
                'constraints' => [
                    new Regex([
                        'pattern' => "/^(([A-Z0-9])*[a-z]){8,}([0-9])+([\W])+([0-9])*([A-Z\W])*$/",
                        'message' => 'Invalid password format.'
                        ])
                ]
            ])
            ->add('nom',TextType::class,[
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Entrez votre nom'
                ],
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 50,
                    'minMessage' => 'Your first name must be at least {{ limit }} characters long',
                    'maxMessage' => 'Your first name cannot be longer than {{ limit }} characters',
                ])
            ])
            ->add('prenom',TextType::class,[
                'label' => 'Prenom',
                'attr' => [
                    'placeholder' => 'Entrez votre prenom'
                ],
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 50,
                    'minMessage' => 'Your first name must be at least {{ limit }} characters long',
                    'maxMessage' => 'Your first name cannot be longer than {{ limit }} characters',
                ])
            ])
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'Homme' => 1,
                    'Femme' => 2,
                ],
                'expanded' => true,
                'multiple' => false,
            ])
           
            ->add('parcours')
            ->add('taille_maillot', ChoiceType::class, [
                'choices' => [
                    'United States' => 'US',
                    'Canada' => 'CA',
                    'Mexico' => 'MX',
                ],
                'placeholder' => 'Selectionnez la taille de votre maillot',
            ])
            ->add('epreuve_choisie', ChoiceType::class, [
                'choices' => $this->getEpreuve(),
            ])
            
            ->add('parcours', ChoiceType::class, [
                'choices' => $this->getParcours(),
            ])
            ->add('taille_maillot', ChoiceType::class, [
                'choices' => [
                    'XS'=>'XS',
                    'S'=>'S',
                    'M'=>'M',
                    'L'=>'L',
                    'XL' => 'XL',
                    '2XL' =>'2XL',
                    '3XL' =>'3XL',
                ],
                'placeholder' => 'Selectionnez la taille de votre maillot',
            ])
            ->add('numero_dossard', ChoiceType::class, [
                'choices' => $this->getDossard(),
            ])            
            ->add('categorie_age', ChoiceType::class, [
                'choices' => $this->getCategorieAge(),
            ])             
            ->add('type_epreuve', ChoiceType::class, [
                'choices' => $this->getTypeEpreuve(),
            ])
            ->add('birth', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de naissance',
                // additional options here
            ])
            ->add('date_epreuve', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date d\'épreuve',
                // additional options here
            ])
            ->add('submit',SubmitType::class,[
                'label' => "S'inscrire",
            ])
        ;
    }
    private function getEpreuve()
    {
        $choices = [];

        $repository = $this->doctrine->getRepository(Epreuve::class);
        $myEntities = $repository->findAll();

        foreach ($myEntities as $myEntity) {
            $choices[$myEntity->getEpNom()] = $myEntity->getEpNom();
        }

        return $choices;
    }
    private function getParcours()
    {
        $choices = [];

        $repository = $this->doctrine->getRepository(Parcours::class);
        $myEntities = $repository->findAll();

        foreach ($myEntities as $myEntity) {
            $choices[$myEntity->getPaNomParcours()] = $myEntity->getPaNomParcours();
        }

        return $choices;
    }
    private function getCategorieAge()
    {
        $choices = [];

        $repository = $this->doctrine->getRepository(Categorie::class);
        $myEntities = $repository->findAll();

        foreach ($myEntities as $myEntity) {
            $choices[$myEntity->getCatNom()] = $myEntity->getCatNom();
        }

        return $choices;
    }
    private function getTypeEpreuve()
    {
        $choices = [];

        $repository = $this->doctrine->getRepository(TypeEpreuve::class);
        $myEntities = $repository->findAll();

        foreach ($myEntities as $myEntity) {
            $choices[$myEntity->getTypepNom()] = $myEntity->getTypepNom();
        }

        return $choices;
    }
    private function getDossard(){
        $dossard = [];
        for ($i = 1; $i <= 100; $i++) {
            $dossard[] = $i ;
        }
        return $dossard;
    }    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'constraints' => [
                new UniqueEntity([
                    'fields' => 'username',
                    'message' => 'Cette utilisateur existe déja !',
                ]),
            ],
        ]);
    }
}
