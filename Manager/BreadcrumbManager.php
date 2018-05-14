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
     * @var mixed
     */
    private $homeRouteParams;

    /**
     * @var TwigEnvironment
     */
    protected $twig;

    /**
     * BreadcrumbManager constructor.
     * @param TwigEnvironment $twig
     * @param array $params
     */
    public function __construct(TwigEnvironment $twig, array $params)
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
    public function loadBreadcrumb()
    {
        $this->addItem($this->homeRouteName, $this->homeRoute, $this->homeRouteParams);
    }

    /**
     * @return Breadcrumb
     */
    public function getBreadcrumb()
    {
        return $this->breadcrumb;
    }

    /**
     * @param $name
     * @param null $route
     * @param array $routeParams
     * @return Breadcrumb
     */
    public function addItem($name, $route = null, $routeParams = array())
    {
        $this->breadcrumb->addLink($name, $route, $routeParams);

        return $this->breadcrumb;
    }

    /**
     * @return mixed|string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     *
     */
    public function clear()
    {
        $this->breadcrumb->clear();
    }

    /**
     * @return Response
     */
    public function display()
    {
        return $this->twig->render($this->template, array('breadcrumb', $this->breadcrumb));
    }
}