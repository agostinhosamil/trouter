<?php
/**
 * @version 2.0
 * @author Sammy
 *
 * @keywords Samils, ils, php framework
 * -----------------
 * @namespace Sammy\Packs\Trouter
 * - Autoload, application dependencies
 */
namespace Sammy\Packs\Trouter {
  include_once (dirname(__FILE__) .
    '/vendor/php-module/autoload.php'
  );



  require (dirname (__FILE__) .
    '/vendor/include-all/autoload.php'
  );
	/**
	 * Make sure the module base internal class is not
	 * declared in the php global scope defore creating
	 * it.
	 */
	$includeAll = require (dirname (__FILE__) .
    '/vendor/include-all/core/index.php'
  );
  /**
   * Import the Library Core
   * -
   * Containing its main class with the
   * core functionalities
   */
  include_once (dirname(__FILE__) .
    '/core/index.php'
  );
  /**
   * Autoload includeAll extensions
   */
  $includeAll->includeAll ('./exts');
  $includeAll->includeAll ('./config');
}
