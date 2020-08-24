<?php
/**
 * @version 2.0
 * @author Sammy
 *
 * @keywords Samils, ils, php framework
 * -----------------
 * @namespace Sammy\Packs\Trouter\Config
 * - Autoload, application dependencies
 */
namespace Sammy\Packs\Trouter\Config {
  use php\module;
  /**
   * PHPModule Configuration
   */

  module::config ('Trouter Dir',
    dirname (__DIR__)
  );

  module::config ('php Modules Directories', [
    '<trouterDir>/modules',
    '<appDir>/lib/php-modules'
  ]);

  module::definePath ('<trouter>',
    '<trouterDir>/modules'
  );
}
