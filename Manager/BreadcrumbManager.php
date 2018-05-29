<?php

namespace Fabz29\BreadcrumbBundle\Manager;

use Fabz29\BreadcrumbBundle\Model\Breadcrumb;
use Symfony\Component\HttpFoundation\Response;
use Twig_Environment as TwigEnvironment;

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
        $this->template = $params['template'];
        $this->homeRouteName = $params['home_route_name'];
        $this->homeRoute = $params['home_route'];
        $this->homeRouteParams = $params['home_route_params'];
        $this->twig = $twig;
        $this->breadcrumb = new Breadcrumb();
        $this->loadBreadcrumb();
    }

    /**
     * Add the homepage route
     */
    public function loadBreadcrumb(): void
    {
        $this->addItem($this->homeRouteName, $this->homeRoute, $this->homeRouteParams);
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
     * @param null|string $route
     * @param null|array $routeParams
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
     */
    public function display(): string
    {
        return $this->twig->render($this->template, ['breadcrumb' => $this->breadcrumb]);
    }
}