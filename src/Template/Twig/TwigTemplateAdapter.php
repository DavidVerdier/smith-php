<?php
namespace Smith\Template\Twig;

use Smith\Template\Renderable;
use Twig\Template;

class TwigTemplateAdapter implements Renderable {
	
	private $wrapper;
	
	/**
	 * @param \Twig_TemplateWrapper $wrapper	The twig template to be adapted.
	 */
	public function __construct(\Twig_TemplateWrapper $wrapper) {
		$this->wrapper = $wrapper;
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Smith\Template\Renderable::render()
	 */
	public function render(array $params = array()) : string {
		return $this->wrapper->render($params);
	}
}
