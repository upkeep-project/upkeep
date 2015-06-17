<?php

namespace Upkeep\AppBundle\View;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\EngineInterface;

class LoginView
{

    /**
     * @var EngineInterface
     */
    private $engine;

    public function __construct(EngineInterface $engine)
    {
        $this->engine = $engine;
    }

    public function checkLogin($lastUsername, $error)
    {
        return new Response(
            $this->engine->render('UpkeepAppBundle:App:login.html.twig',
                array('lastUsername' => $lastUsername,
                      'error' => $error
                ))
        );
    }

}