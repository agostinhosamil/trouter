<?php
/**
 * @version 2.0
 * @author Sammy
 *
 * @keywords Sammy, Packs, php framework
 * -----------------
 * @namespace Sammy\Packs\Trouter\ViewExtensionAlternates
 * - Autoload, application dependencies
 */
namespace Sammy\Packs\Trouter\ViewExtensionAlternates {
  /**
   * Make sure the module base internal class is not
   * declared in the php global scope defore creating
   * it.
   */
  $module->exports = array_merge ([''],
    preg_split ('/\s+/', '.php /index.php .phtml /index.phtml')
  );
}
