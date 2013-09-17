<?php

namespace Kimai\Bundle\AuthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * SecurityController
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 */
class SecurityController extends Controller
{
    /**
     * @Route("/logout")
     */
    public function logoutAction()
    {
    }

    /**
     * @Route("/login-check")
     */
    public function checkAction()
    {
    }

    /**
     * @param Request $request
     *
     * @Route("/login")
     * @Template()
     *
     * @return array
     */
    public function loginAction(Request $request)
    {
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $request->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
            $request->getSession()->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return array(
            'csrf_token'    => $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate'),
            'last_username' => $request->getSession()->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        );
    }
}
