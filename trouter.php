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

  if (isset ($module)) {
    $module->exports = (
      new Base
    );
  }
  return ( new Base );
}
