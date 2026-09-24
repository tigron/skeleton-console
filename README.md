# skeleton-console

## Description

This library contains a console application to interact with Skeleton
packages. It is based on symfony/console and collects the commands of all
installed Skeleton packages, so they are available via a single binary.

## Installation

Installation via composer:

    composer require tigron/skeleton-console

## Usage

The binary is installed in the composer bin-directory of your project:

    ./vendor/bin/skeleton

Running it will list all available commands. The commands of every installed
Skeleton package are collected automatically.

## Adding commands to a package

A Skeleton package can provide its own commands. Create a `console` directory
in the root of the package and add one file per command:

    - skeleton-example
      - console
        - Hello.php

The class should extend from `\Skeleton\Console\Command\Command` and must be
named `\Skeleton\Console\Command\Example_Hello`, where `Example` is the
package name without the `skeleton-` prefix:

    <?php

    namespace Skeleton\Console\Command;

    class Example_Hello extends \Skeleton\Console\Command\Command {

        /**
         * Configure method
         *
         * @access protected
         */
        protected function configure() {
            $this->setName('example:hello');
        }

        /**
         * Execute method
         *
         * @access protected
         */
        protected function execute($input, $output): int {
            $output->writeln('Hello');
            return 0;
        }

    }
