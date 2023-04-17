<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Contact;
use App\Jagaad\Company;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route(path: '/')]
    public function index(): Response
    {
        return $this->redirect('/contact');
    }

    #[Route(path: '/contact')]
    public function contact(Request $request, ContactRepository $repository): Response
    {
        $form = $this->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $repository->save($form->getData(), true);
        }

        return $this->render('contact.html.twig', [
            'formContact' => $form,
            'contacts' => $repository->findAll(),
        ]);
    }

    private function getForm(): FormInterface
    {
        $contact = new Contact();

        return $this->createFormBuilder($contact)
            ->setAction('/contact')
            ->add('email', EmailType::class, ['label' => false, 'attr' => ['placeholder' => 'Email']])
            ->add('title', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'Title']])
            ->add('description', TextareaType::class, ['label' => false, 'attr' => ['placeholder' => 'Description']])
            ->add('proposedMeetingDate', DateType::class, ['attr' => ['placeholder' => 'Meeting Date']])
            ->add('submit', SubmitType::class, ['label' => 'Send'])
            ->getForm();
    }
}
