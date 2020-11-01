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
// Backend modules
$GLOBALS['BE_MOD']['content']['bootstrapSlider'] = ['tables' => ['tl_xippo_bs_slider','tl_xippo_bs_slide','tl_content'],
];
// Models
$GLOBALS['TL_MODELS']['tl_xippo_bs_slider'] = XippoGmbH\ContaoBootstrapSliderBundle\Model\BootstrapSliderModel::class;
$GLOBALS['TL_MODELS']['tl_xippo_bs_slide'] = XippoGmbH\ContaoBootstrapSliderBundle\Model\BootstrapSlideModel::class;