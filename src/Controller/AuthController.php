<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\Employee;
use Doctrine\ORM\EntityManagerInterface;

final class AuthController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(Request $request, SessionInterface $session, EntityManagerInterface $entityManager): Response
    {
        if ($request->isMethod('POST')) {
            $username = $request->request->get('_username');
            $password = $request->request->get('_password');

            $employee = $entityManager->getRepository(Employee::class)->findOneBy(['employee_username' => $username]);

            if (!$employee) {
                $this->addFlash('error', 'User does not exist');
                return $this->render('auth/index.html.twig');
            }

            if (!$this->verifyPassword($employee, $password)) {
                $this->addFlash('error', 'Password does not match');
                return $this->render('auth/index.html.twig');
            }

            $session->start();
            $session->set('user_id', $employee->getId());
            $session->set('username', $employee->getEmployeeUsername());
            $session->save();

            return $this->render('auth/save_localstorage.html.twig', [
                'user_id' => $employee->getId(),
                'username' => $employee->getEmployeeUsername(),
            ]);
        }
        return $this->render('auth/index.html.twig');
    }

    private function verifyPassword(Employee $user, string $password): bool
    {
        return $password === $user->getEmployeePassword();
    }
}