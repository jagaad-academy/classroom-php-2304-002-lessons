<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class DefaultController extends AbstractController
{
    public function index(UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        $plaintextPassword = '1234';

        // hash the password (based on the security.yaml config for the $user class)
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'hashedPassword' => $hashedPassword
        ]);
    }

    #[Route('/user/{id}', name: 'app_user', methods: ['GET', 'HEAD'])]
    public function userInfo(Request $request): Response
    {
        $this->addFlash(
            'notice',
            'Welcome user #' . $request->get('id')
        );

        return $this->render('default/user.html.twig', [
            'url' => $this->generateUrl('app_product', ['id' => 1111], UrlGeneratorInterface::ABSOLUTE_URL)
        ]);
    }

    #[Route('/user/profile', name: 'app_user_profile', methods: ['GET', 'HEAD'], priority: 2)]
    public function userProfile(): Response
    {
        return $this->render('default/profile.html.twig', []);
    }

    #[Route('/user/profile/json', name: 'app_user_profile_json', methods: ['GET', 'HEAD'])]
    public function userProfileJson(): Response
    {
        return $this->json(['username' => 'test test']);
    }

    #[Route('/user/profile/file', name: 'app_user_profile_file', methods: ['GET', 'HEAD'])]
    public function userProfileFile(): Response
    {
        return $this->file('/test.jpg');
    }

    #[Route('/login', name: 'app_user_login', methods: ['GET', 'HEAD'])]
    public function login(): Response
    {
        return $this->render('default/login.html.twig', []);
    }

    #[Route('/logout', name: 'app_user_logout', methods: ['GET', 'HEAD'])]
    public function logout(): Response
    {
        return $this->redirectToRoute('app_user_login', [], Response::HTTP_MOVED_PERMANENTLY);
    }

    #[Route('/logout-to-user', name: 'app_redirect_with_query_param', methods: ['GET', 'HEAD'])]
    public function logoutToUser(): Response
    {
        return $this->redirectToRoute('app_user', ['id' => 345], Response::HTTP_OK);
    }

    #[Route('/redirect-to-current', name: 'app_redirect_to_current', methods: ['GET', 'POST', 'HEAD'])]
    public function redirectToCurrent(Request $request): Response
    {
        if(isset($_POST['submit-button'])){
            //.....
            return $this->redirectToRoute($request->attributes->get('_route'));
        }
    }

    #[Route('/redirect-with-query-params/{id}', name: 'app_user_login', methods: ['GET', 'HEAD'])]
    public function redirectWithQueryParams(Request $request): Response
    {
        return $this->redirectToRoute('app_user', $request->query->all());
    }
}
