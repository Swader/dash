<?php

/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    public function assetsWatch()
    {
        $this->taskWatch()
            ->monitor('build', function () {
                $this->say(date('H:i:s').": starting Less/CSS rebuild");
                $this->assetsBuild();
                $this->say(date('H:i:s').": less/CSS rebuild done!");
            })->monitor('js', function () {
                $this->say(date('H:i:s').": starting JS rebuild");
                $this->assetsBuild();
                $this->say(date('H:i:s').": JS rebuild done!");
            })->run();
    }

    public function assetsBuild($opts = ['clear' => false])
    {
        if ($opts['clear']) {
            $this->_exec('../vendor/bin/mini_asset clear --config assets.ini');
        }
        $this->_exec('../vendor/bin/mini_asset build --config assets.ini');
    }
}