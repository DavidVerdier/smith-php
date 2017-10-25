<?php
namespace Smith\Template\Twig;

use Smith\Template\TemplateLoaderInterface;
use Smith\Template\Renderable;

class TwigLoaderAdapter implements TemplateLoaderInterface {
	
	private $loader;
	
	private $env;
	
	private $templatesPath;
	
	private $cachePath;
	
	private $ready = false;
	
	/**
	 * @param string $templatesPath		Path to template files storage
	 * @param string $cachePath			Path to store template cache
     * @throws NoTwigException
	 */
	public function __construct(string $templatesPath, string $cachePath = null) {
	    if (!class_exists("\Twig_Environment")) {
	        throw new NoTwigException();
        }
		$this->templatesPath = $templatesPath;
		$this->cachePath = $cachePath;
	}
	
	/**
	 * Returns a \Twig_TemplateWrapper wrapped as a Renderable
	 * {@inheritDoc}
	 * @see \Smith\Template\TemplateLoaderInterface::load()
	 */
	public function load(string $path) : Renderable {
		if (!$this->ready) {
			$this->init();
		}
		return new TwigTemplateAdapter($this->env->load($path));
	}
	
	/**
	 * The constructor does not create a full loader instance.
	 * Instead, initialization is deferred to the first use (or manual)
	 * for performance in case the loader is not needed.
	 */
	public function init() {
		if ($this->ready) return;
		
		if ($this->cachePath === null) {
			$this->cachePath = $this->templatesPath."/cache";
		}
		
		if (!is_dir($this->templatesPath)) {
			mkdir($this->templatesPath, '0755', true);
		}
		
		if (!is_dir($this->cachePath)) {
			mkdir($this->cachePath, '0755', true);
		}
		
		$this->loader = new \Twig_Loader_Filesystem($this->templatesPath);
		$this->env = new \Twig_Environment($this->loader, array(
				'cache' => $this->cachePath,
				'auto_reload' => true,
				'strict_variables' => true
		));
		
		$this->ready = true;
	}
}
