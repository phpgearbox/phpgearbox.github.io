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

use Symfony\Component\Finder\Finder;

class RoboFile extends Robo\Tasks
{
	public function generateDocs()
	{
		// Copy all the READMEs into our additional docs folder
		$finder = new Finder();
		$dirs = $finder->directories()->in('./vendor/gears/')->depth('== 0');
		foreach ($dirs as $dir)
		{
			$this->taskFileSystemStack()->copy
			(
				'./vendor/gears/'.$dir->getRelativePathname().'/README.md',
				'./source/additional/'.$dir->getRelativePathname().'/README.md',
				true
			)->run();
		}

		// Generate the site
		$this->taskExec('./vendor/bin/gearsdoc')
			->option('name', 'phpGearBox')
			->option('input', './vendor/gears')
			->option('output', './output')
			->option('index', './source/index.html')
			->option('additional-docs', './source/additional')
			->option('link', '"[GitHub](https://github.com/phpgearbox)"')
			->option('link', '"[Brad Jones](https://www.linkedin.com/in/bradjonescomputing)"')
			->option('ignore', 'tests')
			->option('ignore', 'RoboFile.php')
			->option('ignore', 'fancytree.js')
			->option('ignore', 'lunr.js')
			->option('ignore', 'jquery.js')
		->run();

		// Copy it into the root
		$this->taskFileSystemStack()->mirror('./output', './')->run();
	}
}