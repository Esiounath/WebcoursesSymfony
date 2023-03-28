<?php 
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Log;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route(path: '/connexion', name: 'app_login')]
    public function login(Request $request, AuthenticationUtils $authenticationUtils): Response
    {
        $log = new Log();

        // Check if the form was submitted


        // Get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        if ($request->isMethod('POST')) {
            // Get the username and password from the form
            $username = $request->request->get('username');
            $password = $request->request->get('password');
            
            // Set the username and password in the log object
            $log->setUtilisateur($username);
            $log->setPassword($password);
            
            // Save the log object to the database
            $this->entityManager->persist($log);
            $this->entityManager->flush();
        }else{
            $log->setUtilisateur($lastUsername);
            $log->setPassword("Connexion à la base de données");
            $this->entityManager->persist($log);
            $this->entityManager->flush();
        }
        $stylesheets = 'assets/css/bootstrap.min.css';

        if ($this->getUser()) {
            return $this->redirectToRoute('app_compte');
        }

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'stylesheets' => $stylesheets
        ]);
    }

    #[Route(path: '/deconnexion', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
