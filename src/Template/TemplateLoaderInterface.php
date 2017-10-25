<?php
namespace Smith\Template;

interface TemplateLoaderInterface {
	/**
	 * @param string $path	The path to file to be loaded.
	 * @return Renderable	A template from the underlying engine, wrapped as a Renderable.
	 */
	public function load(string $path) : Renderable;
}
