<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Service\ContactService;
use App\Repository\UserRepository;
use App\Repository\ProjectRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(
        ProjectRepository $projectRepository, 
        UserRepository $userRepository, 
        HttpFoundationRequest $request, 
        ContactService $contactService
    ): Response
    {
        // Find projects
        $projects = $projectRepository->findBy([], ['id' => 'DESC']);

        // Find user
        $user = $userRepository->findAll();

        // Receive messages from form contact
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            // dd($contact);
            $contactService->persistContact($contact);

            return $this->redirectToRoute('home');
        }

        return $this->render('home/index.html.twig', [
            'projects' => $projects,
            'user' => $user,
            'form' => $form->createView()
        ]);
    }
}
