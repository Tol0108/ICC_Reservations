<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Role;
use App\Repository\RoleRepository;

#[Route('/role')]
class RoleController extends AbstractController
{
    #[Route('/', name: 'role_index', methods: ['GET'])]
    public function index( RoleRepository $repository): Response
    {
        $role = $repository->findAll();

        return $this->render('role/index.html.twig', [
            'roles' => $role,
            'resource' => 'Role',
        ]);
    }
    #[Route('/{id}', name:'role_show', methods: ['GET'])]
    public function show(int $id, RoleRepository $repository): Response
    {
        $role = $repository->find($id);

        return $this->render('role/show.html.twig', [
            'role' => $role,
        ]);
    }

}

