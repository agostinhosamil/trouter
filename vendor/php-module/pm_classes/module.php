<?php
/**
 * @class module
 * @version 1.0
 */
namespace php {
    /**
     * Make sure the module base internal class is not
     * declared in the php global scope defore creating
     * it.
     */
    if (!class_exists('php\\module')) {
    /**
     * @class module
     */
    final class module {
      use module\Parser;
      use module\Define;
      use module\Config;
      use module\InitCl;
      use module\Setter;
      use module\Getter;
      use module\clBase;
      use module\Paths;

      # Exts
      use module\AlternateDirectories;
      use module\InstanceFragmentBase;
      use module\PHPModuleConfigure;
      use module\ImportByAlternates;
      use module\PHPModulePathsConf;
      use module\SaniModulePathName;
      use module\PHPModulePathsRead;
      use module\RootImportConfigs;
      use module\ExtensionSetters;
      use module\CommandExecuter;
      use module\Extender;

      public static final function setModuleCache ($module, $module_abs) {
      }
      /**
       * @method exports
       * - Method used to export any object
       * - for the  current module
       */
      public final function exports () {
        if (!$this->moduleInterrop) {
          $this->moduleInterrop = (
            true
          );

          $this->props ['#default'] = (
            $this->exports
          );
        }

        return call_user_func_array ([$this, 'setProp'],
          func_get_args ()
        );
      }
    }}
}
