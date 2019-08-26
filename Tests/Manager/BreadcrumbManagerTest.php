<?php

namespace Fabz29\BreadcrumbBundle\Tests\Model;

use Fabz29\BreadcrumbBundle\Manager\BreadcrumbManager;
use Fabz29\BreadcrumbBundle\Model\Breadcrumb;
use Fabz29\BreadcrumbBundle\Model\Link;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class BreadcrumbManagerTest
 * @package Fabz29\BreadcrumbBundle\Tests\Model
 */
class BreadcrumbManagerTest extends TestCase
{
    /**
     * @var MockObject
     */
    private $twigMock;

    public function setUp(): void
    {
        $this->twigMock = $this->getMockBuilder('Twig\Environment')->disableOriginalConstructor()->getMock();
    }

    public function testAddItem()
    {
        $expectedBreadcrumb = new Breadcrumb();
        $expectedBreadcrumb->addLink('test');
        $breadcrumbManager = new BreadcrumbManager($this->twigMock, []);
        $this->assertEquals($expectedBreadcrumb, $breadcrumbManager->addItem('test'));
    }

    public function tearDown(): void
    {
       $this->twigMock = null;
    }
}
