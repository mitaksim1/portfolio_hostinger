<?php

namespace App\EventSubscriber;

use App\Entity\Project;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    private $security;

    // SluggerInterface récupère la chaîne de caractère et la transforme en un slug
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    // Attrape tous les évènements liés aux entités avant qu'ils ne soient persités
    // et les envoi à la fonction setProjectUser
    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setProjectUser'],
        ];
    }

    // Cette fonction recevra les évènements de toutes les entités, il faut lui préciser l'entité souhaitée
    public function setProjectUser(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        // Si instance de Project
        if (($entity instanceof Project)) {
            // Récupère l'utilisateur courant
            $user = $this->security->getUser();
            $entity->setUser($user);
        }

        // Si aucun, on ne fait rien
        return;
    }
}
