<?php
namespace Test;

use Smith\Template\Component;

class TestView extends Component {
	
	private $vars = array();
	
	public function __construct($vars) {
		$this->vars = $vars;
	}
	
	public function render() {
		extract($this->vars);
		
		ob_start();
		?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?></title>
    </head>
    <body class="">
        <?= $title ?>
    </body>
</html>
		<?php
		$content = ob_get_clean();
		var_dump($content);
		return $content;
	}
}
?>
