<?php

namespace Fabz29\BreadcrumbBundle\Manager;

use Fabz29\BreadcrumbBundle\Model\Breadcrumb;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment as TwigEnvironment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Class BreadcrumbManager
 * @package Fabz29\BreadcrumbBundle\Manager
 */
class BreadcrumbManager
{
    /**
     * @var string
     */
    private $template;

    /**
     * @var Breadcrumb
     */
    private $breadcrumb;

    /**
     * @var string
     */
    private $homeRouteName;

    /**
     * @var string
     */
    private $homeRoute;

    /**
     * @var array
     */
    private $homeRouteParams;

    /**
     * @var TwigEnvironment
     */
    protected $twig;

    /**
     * BreadcrumbManager constructor.
     * @param TwigEnvironment $twig
     * @param array|null $params
     */
    public function __construct(TwigEnvironment $twig, ?array $params)
    {
        $this->template = isset($params['template']) ? $params['template'] : 'Fabz29BreadcrumbBundle::Breadcrumb/render.html.twig';
        $this->homeRouteName = isset($params['home_route_name']) ? $params['home_route_name'] : null;
        $this->homeRoute = isset($params['home_route']) ? $params['home_route'] : null;
        $this->homeRouteParams = isset($params['home_route_params']) ? $params['home_route_params'] : null;
        $this->twig = $twig;
        $this->breadcrumb = new Breadcrumb();
        $this->loadBreadcrumb();
    }

    /**
     * Add the homepage route
     */
    public function loadBreadcrumb(): void
    {
        if($this->homeRouteName)
        {
            $this->addItem($this->homeRouteName, $this->homeRoute, $this->homeRouteParams);
        }
    }


    /**
     * @return Breadcrumb
     */
    public function getBreadcrumb(): Breadcrumb
    {
        return $this->breadcrumb;
    }

    /**
     * @param string $name
     * @param string|null $route
     * @param array|null $routeParams
     * @return Breadcrumb
     */
    public function addItem(string $name, ?string $route = null, ?array $routeParams = array()): Breadcrumb
    {
        $this->breadcrumb->addLink($name, $route, $routeParams);

        return $this->breadcrumb;
    }

    /**
     * @return string
     */
    public function getTemplate():  string
    {
        return $this->template;
    }

    /**
     *
     */
    public function clear(): void
    {
        $this->breadcrumb->clear();
    }

    /**
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function display(): string
    {
        return $this->twig->render($this->template, ['breadcrumb' => $this->breadcrumb]);
    }
}
