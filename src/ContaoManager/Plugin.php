<?php
/**
 * This file is part of a Xippo GmbH Contao Bundle.
 *
 * (c) Aurelio Gisler (Xippo GmbH)
 *
 * @author     Aurelio Gisler
 * @package    ContaoBootstrapSlider
 * @license    MIT
 * @see        https://github.com/xippoGmbH/contao-bootstrap-slider-bundle
 *
 */
namespace XippoGmbH\ContaoBootstrapSliderBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use XippoGmbH\ContaoBootstrapSliderBundle\ContaoBootstrapSliderBundle;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ContaoBootstrapSliderBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
