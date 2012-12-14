<?php

namespace CMS\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;

class User extends ControllerAbstract
{
    public function loginAction()
    {
        return 'loggin in';
    }

    public function logoutAction()
    {
        $currentUser = $this->event->container->currentUser;
        $request     = $this->event->request;

        $currentUser->logout();

        return new RedirectResponse(
            $request->getBaseUrl().'/'.$this->getParam('area', 'user').'/login'
        );
    }
}