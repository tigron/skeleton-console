<?php
/**
 * Command Class
 *
 * @author Gerry Demaret <gerry@tigron.be>
 * @author Christophe Gosiau <christophe@tigron.be>
 * @author David Vandemaele <david@tigron.be>
 */

namespace Skeleton\Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends \Symfony\Component\Console\Command\Command {

	/**
	 * Configure method
	 *
	 * @access protected
	 */
    protected function configure() {
    }

	/**
	 * Execute method
	 *
	 * @access protected
	 * @param InputInterface $input
	 * @param OutputInterface $ouput
	 */
    protected function execute(InputInterface $input, OutputInterface $output) {
    }
}
