<?php

namespace Upkeep\AppBundle\Controller;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Upkeep\AppBundle\View\LoginView;

class LoginController
{

    /**
     * @var LoginView
     */
    private $view;

    private $authUtils;

    public function __construct(LoginView $view, AuthenticationUtils $authUtils)
    {
        $this->view = $view;
        $this->authUtils = $authUtils;
    }

    public function checkLogin()
    {
        $error = $this->authUtils->getLastAuthenticationError();
        $lastUsername = $this->authUtils->getLastUsername();

        return $this->view->checkLogin($lastUsername, $error);
    }

}
