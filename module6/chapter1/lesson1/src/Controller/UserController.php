<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user', name: 'app_user')]
    public function index(Request $request, UserRepository $repository): Response
    {
        $user = new User();
        $form = $this->createFormBuilder($user)
            ->add('first_name', TextType::class)
            ->add('last_name', TextType::class)
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class, ['required' => false,
                "label" => "Your password"])
            ->add('address', TextType::class, ['required' => false])
            ->add('submit', SubmitType::class, ['label' => 'Send'])
        ->getForm();

        $form->handleRequest($request);

        $message = '';
        if($form->isSubmitted() && $form->isValid()){
            $message = "Form has been submitted and is valid!";
            $data = $form->getData();
            $repository->store($data);
        }

        return $this->render('user/user.html.twig', [
            'user_form' => $form,
            'message' => $message
        ]);
    }

    #[Route('/user-class', name: 'app_user_form_class')]
    public function indexFormClass(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        $message = '';
        if($form->isSubmitted() && $form->isValid()){
            $message = "Form has been submitted and is valid!";
            $data = $form->getData();
            $photo = $form->get('photo')->getData();
        }

        return $this->render('user/user-class.html.twig', [
            'user_form' => $form,
            'message' => $message
        ]);
    }

    #[Route('/user/{id}')]
    public function show(User $user)
    {
        return $this->render('user/user-info.html.twig', [
            'user' => $user
        ]);
    }
}
