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
  include_once (dirname (__FILE__) .
    '/autoload.php'
  );
	/**
	 * Make sure the module base internal class is not
	 * declared in the php global scope defore creating
	 * it.
	 */
	return include_once (dirname (__FILE__) .
    '/trouter.php'
  );
}
