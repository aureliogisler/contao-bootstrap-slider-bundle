<?php

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace XippoGmbH\ContaoBootstrapSliderBundle\Tests;

use XippoGmbH\ContaoBootstrapSliderBundle\ContaoBootstrapSliderBundle;
use PHPUnit\Framework\TestCase;

class ContaoBootstrapSliderBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new ContaoSkeletonBundle();

        $this->assertInstanceOf('XippoGmbH\ContaoBootstrapSliderBundle\ContaoBootstrapSliderBundle', $bundle);
    }
}
