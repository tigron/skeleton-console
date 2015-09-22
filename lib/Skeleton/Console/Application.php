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

class Application extends Symfony\Component\Console\Application {

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

	}

}
