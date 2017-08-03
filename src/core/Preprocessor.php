<?php
namespace Smith\Core;

include_once(__DIR__.'/../lib/lessc.php');

use lessc;

class Preprocessor {

    public static function buildTemplate(string $filename, string $destDir, string $namespace, string $className) {
        $out = 
"<?php
namespace ".$namespace.";
use Heptagon\Core\Template;
class ".$className." extends Template {
    public function __construct() {
        parent::__construct('".$filename."');
    }
}
?>
";
        file_put_contents($destDir.'/'.$className.".php", $out);
    }

    public static function buildTemplates(string $dir, string $destDir, string $namespace) {
        if (file_exists($dir)) {
            foreach (scandir($dir) as $file) {
                $path = $dir . '/' . $file;
                if (is_file($path)) {
                    self::buildTemplate($path,$destDir,$namespace,pathinfo($path)['filename']);
                }
            }
        }
    }

    public static function buildTheme(string $filename, string $dest) {
        $lessc = new lessc();
        $lessc->compileFile($filename,$dest);
    }

    public static function buildFromConfig(string $filename) {

    }
}
?>