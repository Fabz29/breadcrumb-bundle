<?php

namespace Fabz29\BreadcrumbBundle\Model;

/**
 * Class Link
 * @package Fabz29\BreadcrumbBundle\Model
 */
class Link
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $keyName;

    /**
     * @var string
     */
    private $route;

    /**
     * @var array|null
     */
    private $routeParams;

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Link
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set keyName.
     *
     * @param string $keyName
     *
     * @return Link
     */
    public function setKeyName($keyName)
    {
        $this->keyName = $keyName;

        return $this;
    }

    /**
     * Get keyName.
     *
     * @return string
     */
    public function getKeyName()
    {
        return $this->keyName;
    }

    /**
     * Set route.
     *
     * @param string $route
     *
     * @return Link
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route.
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set routeParams.
     *
     * @param array|null $routeParams
     *
     * @return Link
     */
    public function setRouteParams($routeParams = null)
    {
        $this->routeParams = $routeParams;

        return $this;
    }

    /**
     * Get routeParams.
     *
     * @return array|null
     */
    public function getRouteParams()
    {
        return $this->routeParams;
    }

}
