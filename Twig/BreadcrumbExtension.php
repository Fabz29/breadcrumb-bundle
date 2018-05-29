<?php

namespace Fabz29\BreadcrumbBundle\Twig;

use Fabz29\BreadcrumbBundle\Manager\BreadcrumbManager;

/**
 * Provides an extension for Twig to output breadcrumbs
 *
 * Class BreadcrumbsExtension
 * @package Fabz29\BreadcrumbBundle\Twig
 */
class BreadcrumbExtension extends \Twig_Extension
{
    /**
     * @var BreadcrumbManager
     */
    private $breadcrumbManager;

    /**
     * BreadcrumbsExtension constructor.
     * @param BreadcrumbManager $breadcrumbManager
     */
    public function __construct(BreadcrumbManager $breadcrumbManager)
    {
        $this->breadcrumbManager = $breadcrumbManager;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions(): array
    {
        return [
            new \Twig_SimpleFunction("fabz29_render_breadcrumb", array($this, "renderBreadcrumb"),  array("is_safe" => array("html"))),
        ];
    }

    /**
     * Renders the breadcrumbs in a list
     *
     * @return string
     */
    public function renderBreadcrumb(): string
    {
        return $this->breadcrumbManager->display();
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return "breadcrumbs";
    }
}
