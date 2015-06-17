<?php

namespace Upkeep\AppBundle\Controller\Client;


use Upkeep\AppBundle\View\Client\ClientView;

class ClientController
{

    /**
     * @var ClientView
     */
    private $view;

    public function __construct(ClientView $view)
    {
        $this->view = $view;
    }

    public function showPanel()
    {
        return $this->view->sendPanel();
    }

}