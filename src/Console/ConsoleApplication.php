<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 20-Oct-17
 * Time: 3:22
 */

namespace Smith\Console;

use Smith\Application\Application;

class ConsoleApplication implements Application {

    private $argc;

    private $args;

    private $commands;

    public function __construct() {
        global $argc;
        global $argv;
        if (!empty($argv)) {
            $this->argc = $argc;
            $this->args = $argv;
            $this->commands = array();
        } else {
            die('Not started from command line.');
        }
    }

    public function run() {
        $target = $this->route();

        if ($target !== null) {
            $target->run(array_slice($this->args,2, $this->argc - 2));
        } else {
            echo $this->doc();
        }
    }

    /**
     * @param Command $command The command to register
     */
    public function register(Command $command) {
        $this->commands[$command->getName()] = $command;
    }

    /**
     * @return Command
     */
    private function route() {
        $target = null;

        if (isset($this->args[1])) {
            if (isset($this->commands[$this->args[1]])) {
                $target = $this->commands[$this->args[1]];
            }
        }

        return $target;
    }

    /**
     * @return string
     */
    private function doc() {
        $doc = "Command not defined.\nHelp :\n";

        foreach ($this->commands as $command) {
            $doc .= "> " . $command->getName() ." : ". $command->getShortDoc() ."\n";
        }

        return $doc;
    }
}