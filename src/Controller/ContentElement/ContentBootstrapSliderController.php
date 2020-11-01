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
declare(strict_types=1);

namespace XippoGmbH\ContaoBootstrapSliderBundle\Controller\ContentElement;

use Contao\CoreBundle\Framework\ContaoFramework;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\ServiceAnnotation\ContentElement;
use Contao\ContentModel;
use Contao\FilesModel;
use Contao\Frontend;
use Contao\Image;
use Contao\Model;
use Contao\Template;
use XippoGmbH\ContaoBootstrapSliderBundle\Model\BootstrapSliderModel;
use XippoGmbH\ContaoBootstrapSliderBundle\Model\BootstrapSlideModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @ContentElement(category="texts")
 */
class ContentBootstrapSliderController extends AbstractContentElementController
{
	public function __construct(ContaoFramework $framework)
    {
        $this->framework = $framework;
    }
	
    protected function getResponse(Template $template, ContentModel $model, Request $request): ?Response
    {
		$slider = BootstrapSliderModel::findBy('id', $model->bootstrapSlider_id);
		
		if (!$slider instanceof BootstrapSliderModel) {
            return $template->getResponse();
        }
		
		\System::log('Slider gefunden, die ID ist: ' . $slider->id, __METHOD__, TL_GENERAL);
		
		$options = [
			'order' => 'sorting ASC'
		];
		$tempSlides = BootstrapSlideModel::findBy('pid', $slider->id, $options);
		
		$slider->slideCount = count($tempSlides);
		
		$template->slider = $slider;
        $slides = [];
		
		if($tempSlides->count() > 0) 
		{
			foreach($tempSlides as $tempSlide)
			{
				\System::log('Slide ID: ' . $tempSlide->id, __METHOD__, TL_GENERAL);
				
				if($tempSlide->singleSRC != '')
				{
					$fileModel = FilesModel::findByUuid($tempSlide->singleSRC);
				
					$file = new \File($fileModel->path);
					$img = new Image($file);

					$imgSize = $file->imageSize;
					// TODO: implement image size

					$tempSlide->backgroundImage = $img;
				}
				
				$elements = [];

				$content = ContentModel::findPublishedByPidAndTable($tempSlide->id, 'tl_xippo_bs_slide');

				if (null !== $content) {
					$count = 0;
					$last = $content->count() - 1;

					while ($content->next()) {
						$css = [];

						/** @var ContentModel $objRow */
						$row = $content->current();

						if (0 === $count) {
							$css[] = 'first';
						}

						if ($count === $last) {
							$css[] = 'last';
						}

						$row->classes = $css;
						$elements[] = Frontend::getContentElement($row, $model->strColumn);
						++$count;
					}
				}

				$tempSlide->content = $elements;
				$slides[] = $tempSlide;
			}
		}
		
		$template->slides = $slides;
		
        return $template->getResponse();
    }
}