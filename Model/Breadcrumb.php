<?php

namespace Fabz29\BreadcrumbBundle\Model;

use Fabz29\BreadcrumbBundle\Model\Link;

/**
 * Class Breadcrumb
 * @package Fabz29\BreadcrumbBundle\Model
 */
class Breadcrumb
{
    /**
     * @var array
     */
    private $links;

    /**
     * Breadcrumb constructor.
     */
    public function __construct()
    {
        $this->links = array();
    }

    /**
     * @return array
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @return array
     */
    public function addLink($name, $route = null, $routeParams = array())
    {
        $link = new Link();
        $link->setName($name);
        $link->setRoute($route);
        $link->setRouteParams($routeParams);
        $this->links[] = $link;

        return $this->links;
    }

    /**
     * @return Breadcrumb
     */
    public function clear()
    {
        unset($this->links);
        $this->links = array();

        return $this;
    }
}