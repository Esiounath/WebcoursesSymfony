<?php 
namespace App\Controller;
use App\Form\FormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\Entity\User;
use App\Entity\Log;

class FormController extends AbstractController
{
    private $entityManager;
    private $passwordHasher;
    
    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
    {
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
    }
    #[Route('/inscription', name: 'app_form')]
    public function index(Request $request)
    {
        if ($this->getUser()) {
            // si l'utilisateur est déjà connecté, redirigez-le vers la page de compte
            return $this->redirectToRoute('app_compte');
        }
        $user = new User();
        $log = new Log();
        $form = $this->createForm(FormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Retrieve plain text password from the form data
            $plainPassword = $form->get('password')->getData();
            $log->setUtilisateur($form->get('username')->getData());
            $log->setPassword($form->get('password')->getData());

            // Encode the password
            $encodedPassword = $this->passwordHasher->hashPassword($user, $plainPassword);

            // Set the encoded password on the user object
            $user->setPassword($encodedPassword);
            $this->entityManager->persist($log);
            $this->entityManager->persist($user);
            $this->entityManager->flush();

            // Redirect the user to a success page
            return $this->redirectToRoute('app_home');
        }
        $stylesheets = 'assets/css/bootstrap.min.css';
        return $this->render('form/index.html.twig',[
            'form' => $form->createView(),
            'stylesheets' => $stylesheets
        ]);
    }
}
