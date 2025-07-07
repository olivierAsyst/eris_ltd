<?php

namespace App\Controller;

use App\Repository\ImageGaleryRepository;
use App\Repository\MemberRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(MemberRepository $memberRepository, ImageGaleryRepository $imageGaleryRepository, ): Response
    {
        // $user = new User();
        // $user->setEmail('bonixbag@gmail.com')
        //     ->setFullName('Bonheur baguley')
        //     ->setPhoneNumber('1234567890')
        //     ->setPassword($up->hashPassword($user, 'password'))
        //     ->setRoles(['ROLE_USER']);
        //     ;
        //     $em->persist($user);
        //     $em->flush();
        $members = $memberRepository->findAll();
        $images = $imageGaleryRepository->findAll();
        return $this->render('home/index.html.twig', [
            'members' => $members,
            'images' => $images,
            'controller_name' => 'Acceuil | ERIS'
        ]);
    }
}
