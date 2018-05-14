<?php

namespace Fabz29\BreadcrumbBundle\Model;

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
    public function getLinks(): array
    {
        return $this->links;
    }

    /**
     * @param string $name
     * @param null|string $route
     * @param array|null $routeParams
     * @return array
     */
    public function addLink(string $name, ?string $route, ?array $routeParams): array
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
    public function clear(): Breadcrumb
    {
        unset($this->links);
        $this->links = [];

        return $this;
    }
}