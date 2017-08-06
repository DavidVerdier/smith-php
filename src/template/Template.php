<?php
namespace Smith\Template;

class Template extends Component {

    private $raw;

    private $bindings = array();

    public function __construct(string $filename) {
        $this->raw = file_get_contents($filename);

        preg_match_all('/{{(?<binding>\w+)}}/', $this->raw, $scan);

        foreach ($scan['binding'] as $binding_point) {
            $this->bindings[$binding_point] = null;
        }
    }

    public function render() {
        $out = $this->raw;

        foreach ($this->bindings as $key => $value) {
            if ($value != null) {
                $out = str_replace('{{'.$key.'}}', $value, $out);
            } else {
                if (isset($this->children[$key])) {
                    $out = str_replace('{{'.$key.'}}', $this->children[$key]->run(), $out);
                } else {
                    $out = str_replace('{{'.$key.'}}', 'MISSING:{{'.$key.'}}', $out);
                }
            }
        }
        return $out;
    }

    public function setRaw(string $binding, $value) {
        $this->bindings[$binding] = $value;
    }
}
?>