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
     * @var string|null
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
    public function setName(string $name): self
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
    public function setKeyName(string $keyName): self
    {
        $this->keyName = $keyName;

        return $this;
    }

    /**
     * Get keyName.
     *
     * @return string
     */
    public function getKeyName(): string
    {
        return $this->keyName;
    }

    /**
     * Set keyName.
     *
     * @param string|null $route
     *
     * @return Link
     */
    public function setRoute(?string $route): self
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route.
     *
     * @return string|null
     */
    public function getRoute(): ?string
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
    public function setRouteParams(?array $routeParams): self
    {
        $this->routeParams = $routeParams;

        return $this;
    }

    /**
     * Get routeParams.
     *
     * @return array|null
     */
    public function getRouteParams(): ?array
    {
        return $this->routeParams;
    }

}
