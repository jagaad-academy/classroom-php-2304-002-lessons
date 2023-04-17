<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomeController extends AbstractController
{

    #[Route(path: '/', name: 'homepage')]
    public function index(): Response
    {
        $products = [
            (object)['name' => 'product1', 'price' => 10],
            (object)['name' => 'product2', 'price' => 15],
            (object)['name' => 'product3', 'price' => 20],
            (object)['name' => 'product4', 'price' => 30],
        ];

        return $this->render('home.html.twig', [
            'pageTitle' => 'Symfony Template',
            'name' => 'Lucas',
            'products' => $products,
        ]);
    }

    #[Route(path: '/contact', name: 'contact_page', methods: ['GET'])]
    public function contact(): Response
    {
        $form = $this->getForm();

        return $this->render('contact.html.twig', [
            'contactForm' => $form,
        ]);
    }

    #[Route(path: '/contact', name: 'contact_post', methods: ['POST'])]
    public function contactPost(Request $request): Response
    {
        $form = $this->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $form->getData();
            echo 'execute the insertion.';
            die;
        }

        // @see flash message docs
        return $this->render('contact.html.twig', [
            'contactForm' => $form,
        ]);
    }

    private function getForm(): FormInterface
    {
        $contact = new Contact();

        return $this->createFormBuilder($contact)
            ->setAction('/contact')
            ->add('email', EmailType::class, ['label' => false, 'attr' => ['placeholder' => 'Email']])
            ->add('title', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'Title']])
            ->add('description', TextType::class, ['label' => false, 'attr' => ['placeholder' => 'Description']])
            ->add('proposedMeetingDate', DateType::class, ['attr' => ['placeholder' => 'Meeting Date']])
            ->add('submit', SubmitType::class, ['label' => 'Send'])
            ->getForm();
    }
}
