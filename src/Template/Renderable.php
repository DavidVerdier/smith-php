<?php
namespace Smith\Template;

interface Renderable {
	/**
	 * @param array $params 	An associative array of variables to be used by the template.
	 * @return string			The actual render of the template.
	 */
	public function render(array $params = array()) : string ;
}
