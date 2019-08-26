<?php

namespace Fabz29\BreadcrumbBundle\Tests\Model;

use Fabz29\BreadcrumbBundle\Model\Breadcrumb;
use Fabz29\BreadcrumbBundle\Model\Link;
use PHPUnit\Framework\TestCase;

/**
 * Class BreadcrumbTest
 * @package Fabz29\BreadcrumbBundle\Tests\Model
 */
class BreadcrumbTest extends TestCase
{

    public function testAddLink()
    {
        $link1 = new Link();
        $link1->setName('link1Name');
        $link1->setRoute('link1Route');
        $link1->setRouteParams(['params' => 'testParams']);
        $link2 = new Link();
        $link2->setName('link2Name');
        $link2->setRoute('link2Route');
        $link2->setRouteParams(['params' => 'testParams']);

        $expectedBreadcrumb = [$link1, $link2];

        $breadcrumb = new Breadcrumb();
        $breadcrumb->addLink('link1Name', 'link1Route', ['params' => 'testParams']);
        $breadcrumb->addLink('link2Name', 'link2Route', ['params' => 'testParams']);

        $this->assertEquals($expectedBreadcrumb, $breadcrumb->getLinks());
    }

    public function testAddLinkWithoutName(){
        $breadcrumb = new Breadcrumb();
        $this->expectException('ArgumentCountError');
        $breadcrumb->addLink();
    }
}
