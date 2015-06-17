<?php

namespace Upkeep\AppBundle\View\Client;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Templating\EngineInterface;

class ClientView
{

    /**
     * @var EngineInterface
     */
    private $engine;

    public function __construct(EngineInterface $engine)
    {
        $this->engine = $engine;
    }

    public function sendPanel()
    {
        return new Response(
            $this->engine->render('UpkeepAppBundle:Client:panel.html.twig')
        );
    }

}