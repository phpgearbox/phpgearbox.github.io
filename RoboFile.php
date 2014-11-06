<?php
////////////////////////////////////////////////////////////////////////////////
// __________ __             ________                   __________              
// \______   \  |__ ______  /  _____/  ____ _____ ______\______   \ _______  ___
//  |     ___/  |  \\____ \/   \  ____/ __ \\__  \\_  __ \    |  _//  _ \  \/  /
//  |    |   |   Y  \  |_> >    \_\  \  ___/ / __ \|  | \/    |   (  <_> >    < 
//  |____|   |___|  /   __/ \______  /\___  >____  /__|  |______  /\____/__/\_ \
//                \/|__|           \/     \/     \/             \/            \/
// -----------------------------------------------------------------------------
//          Designed and Developed by Brad Jones <brad @="bjc.id.au" />         
// -----------------------------------------------------------------------------
////////////////////////////////////////////////////////////////////////////////

/*
 * Include our local composer autoloader just in case
 * we are called with a globally installed version of robo.
 */
require_once(__DIR__.'/vendor/autoload.php');

class RoboFile extends Robo\Tasks
{
	public function generateDocs()
	{
		$this->taskExec('./vendor/bin/gearsdoc')
			->option('input', './vendor/gears')
			->option('output', './output')
			->option('index', './source/index.md')
			->option('additional-docs', './source/additional')
			->option('ignore', 'tests')
			->option('ignore', 'RoboFile.php')
			->option('ignore', 'fancytree.js')
			->option('ignore', 'lunr.js')
			->option('ignore', 'jquery.js')
		->run();

		$this->taskFileSystemStack()->mirror('./output', './')->run();
	}
}