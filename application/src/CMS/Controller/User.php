<?php

namespace CMS\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;

class User extends ControllerAbstract
{
    public function loginAction()
    {
        if (!($area = $this->getParam('area'))) {
            throw new \InvalidArgumentException('Area has not been set for this login request');
        }

        return "Logging into $area area";
    }

    public function logoutAction()
    {
        $this->currentUser->logout($area);

        return new RedirectResponse(
            $this->request->getBaseUrl().'/'.$this->getParam('area', 'user').'/login'
        );
    }

    public function registerAction()
    {
        $this->currentUser->logout();

        return 'Form for registration goes here!';
    }

    public function confirmAction()
    {
        $this->currentUser->logout;

        return 'Confirmation area, enter your confirmation code.';
    }

    public function passwordAction()
    {
        return 'Enter information to reset your password.';
    }
}