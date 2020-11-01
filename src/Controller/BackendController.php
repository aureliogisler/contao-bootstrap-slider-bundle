<?php
/**
 * This file is part of a Xippo GmbH Contao Bundle.
 *
 * (c) Aurelio Gisler (Xippo GmbH)
 *
 * @author     Aurelio Gisler
 * @package    ContaoBootstrapSlider
 * @license    MIT
 * @see        https://github.com/xippoGmbH/contao-bootstrap-slider-bundle
 *
 */
declare(strict_types=1);

namespace XippoGmbH\ContaoBootstrapSliderBundle\Controller

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment as TwigEnvironment;

/**
 * @Route("/contao/xippo-bs-slider-route",
 *     name=BackendController::class,
 *     defaults={"_scope" = "backend"}
 * )
 */
class BackendController extends AbstractController
{
    private $twig;
    
    public function __construct(TwigEnvironment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke(): Response
    {
        return new Response($this->twig->render(
            'xippo-bs-slider-route.html.twig', 
            []
        ));
    }
}