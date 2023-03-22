<?php
/**
 * Application Class
 *
 * @author Gerry Demaret <gerry@tigron.be>
 * @author Christophe Gosiau <christophe@tigron.be>
 * @author David Vandemaele <david@tigron.be>
 */

namespace Skeleton\Console;

class Application extends \Symfony\Component\Console\Application {

	/**
	 * Constructor
	 *
	 * @access public
	 */
	public function __construct() {
		parent::__construct('Skeleton Console');
	}

	/**
	 * Add commands
	 *
	 * @access public
	 */
	public function add_commands() {
		/**
		 * Search for other Skeleton packages installed
		 */
		$skeletons = \Skeleton\Core\Skeleton::get_all();

		/**
		 * Check in every Skeleton package for commands
		 */
		foreach ($skeletons as $skeleton) {

			if (!file_exists($skeleton->path . '/console')) {
				continue;
			}

			$files = scandir($skeleton->path . '/console');

			foreach ($files as $file) {
				if ($file[0] == '.') {
					continue;
				}
				require_once $skeleton->path . '/console/' . $file;

				$file = str_replace('.php', '', $file);

				$classname = '\Skeleton\Console\Command\\' . ucfirst(str_replace('-', '_', str_replace('skeleton-', '', $skeleton->name))) . '_' . ucfirst($file);
				$this->add(new $classname);
			}
		}
	}

}
