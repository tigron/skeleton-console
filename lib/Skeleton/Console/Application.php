<?php
/**
 * Application Class
 *
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
		parent::__construct('Skeleton Console', '0.01');
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
		$installed = file_get_contents(__DIR__ . '/../../../../../composer/installed.json');
		$installed = json_decode($installed);

		$packages = [];
		foreach ($installed as $install) {
			$package = $install->name;
			list($vendor, $name) = explode('/', $package);
			if ($vendor != 'tigron') {
				continue;
			}
			$packages[] = $name;
		}

		/**
		 * Check in every Skeleton package for commands
		 */
		foreach ($packages as $package) {
			if (!file_exists(__DIR__ . '/../../../../' . $package . '/console')) {
				continue;
			}

			$files = scandir(__DIR__ . '/../../../../' . $package . '/console');

			foreach ($files as $file) {
				if ($file[0] == '.') {
					continue;
				}
				require_once __DIR__ . '/../../../../' . $package . '/console/' . $file;

				$file = str_replace('.php', '', $file);

				$classname = '\Skeleton\Console\Command\\' . ucfirst(str_replace('skeleton-', '', $package)) . '_' . ucfirst($file);
				$this->add(new $classname);
			}
		}
	}

}
