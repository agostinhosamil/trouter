<?php
/**
 * @version 2.0
 * @author Sammy
 *
 * @keywords Sammy, SammyPacks, php framework
 * -----------------
 * @namespace Sammy\Packs\Trouter
 * - Autoload, application dependencies
 */
namespace Sammy\Packs\Trouter {
  use Closure;
  use php\module;
  /**
   * Make sure the module base internal class is not
   * declared in the php global scope defore creating
   * it.
   */
  if (!class_exists ('Sammy\Packs\Trouter\Base')){
  /**
   * @class Base
   * Base internal class for the
   * Trouter module.
   * -
   * This is (in the ils environment)
   * an instance of the php module,
   * wich should contain the module
   * core functionalities that should
   * be extended.
   * -
   * For extending the module, just create
   * an 'exts' directory in the module directory
   * and boot it by using the ils directory boot.
   * -
   * \Samils\dir_boot ('./exts');
   */
  class Base {

    private $config = array (
      'static-dir' => '<rootDir>/public',
      'pages-dir' => '<appDir>/pages',
      'root-dir' => '<rootDir>',
      'app-dir' => '<rootDir>',
      'controllers-dir' => '<appDir>/controllers',
      'middlewares-dir' => '<appDir>/middlewares'
    );

    /**
     * [config Set a Trouter Configuration Data]
     * @param  string $prop
     * @param  mixed $value
     * @return null
     */
    public final function config ($prop = '', $value = null) {
      if (is_string ($prop)) {
        $prop = module::sanitizePropName ($prop);

        $invalidConfigDataValue = ( boolean ) (
          isset ($this->config [ $prop ]) &&
          gettype ($this->config[$prop]) !== (
            gettype ($value)
          )
        );

        if ( $invalidConfigDataValue ) {
          return;
        }

        if (is_array ($value) && !$invalidConfigDataValue) {
          $value = array_merge ($this->config[$prop],
            $value
          );
        }

        if (preg_match ('/-?dir$/', $prop)) {
          module::config ($prop, $value);
        }

        $this->config [ $prop ] = $value;
      } elseif (is_array ($prop)) {
        foreach ($prop as $key => $value) {
          $this->config ($key, $value);
        }
      }
    }


    public final function getConfig ($prop) {
      if ( is_string ($prop) ) {
        $prop = module::sanitizePropName (
          $prop
        );

        if (!isset ($this->config [ $prop ])) {
          return null;
        }

        $data = $this->config [ $prop ];

        return !is_string ($data) ? $data : (
          module::readPath ($data)
        );
      }
    }


    public final function __construct () {
      $trouterConfig = requires ('~/.trouter');

      # Configure Trouter with the given datas
      # from the '.trouter' module in the project
      # root directory in case of being an array
      # exported from it
      if (is_array ( $trouterConfig )) {
        $this->config ($trouterConfig);
      }
    }


    private final function handleMiddlewares () {
      $middlewaresDir = $this->getConfig (
        'middlewaresDir'
      );

      $middlewaresList = glob ($middlewaresDir .
        DIRECTORY_SEPARATOR . '*.php'
      );


      foreach ($middlewaresList as $middleware) {
        $middlewaresCore = requires ($middleware);

        if ($middlewaresCore instanceof Closure) {
          call_user_func_array ($middlewaresCore,
            []
          );
        }
      }
    }

    private final function handleStatic ($route) {
      $filePath = module::readPath (
        $this->getConfig ('Static Dir') . (
          DIRECTORY_SEPARATOR . $route
        )
      );

      if (is_file ($filePath)) {

        $contentType = null;
        $contentTypes = requires (
          '<trouter>/content/types'
        );

        $type = pathinfo (strtolower($filePath),
          PATHINFO_EXTENSION
        );

        if (is_array ($types = $contentTypes)) {
          $contentType = !isset ($types [$type]) ? null : (
            $contentTypes [ $type ]
          );
        }

        if ( !$contentType ) {
          $contentType = (
            'text/plain'
          );
        }

        header ('content-type: ' . $contentType);
        exit ( include ($filePath) );
      }
    }
    /**
     * [run Run Trouter Application]
     * @return null
     */
    function run () {

      $requestDatas = requires ('<trouter>/request-datas');
      $ds = DIRECTORY_SEPARATOR;
      $route = $requestDatas->route;

      $route = empty ($route) ? 'index' : (
        $route
      );

      $this->handleMiddlewares ();
      $this->handleStatic ($route);

      if ($controller = $this->resolveController ($route)) {
        $controllerCore = requires ($controller);

        if ($controllerCore instanceof Closure) {
          call_user_func_array ($controllerCore, []);
        }
      }

      if ($view = $this->resolveView ($route)) {
        return $this->render ($view);
      }

      if ($view404 = $this->resolveView ('404')) {
        return $this->render ($view404);
      } else {
        exit ('page not found');
      }
    }

    public final function render ($view = '') {
      if (is_string ($view) && is_file ($view)) {
        include_once ($view);
      }
    }


    private final function resolveView ($route) {
      $alts = requires ('<trouter>/ealts');

      foreach ( $alts as $alt ) {
        $viewPath = module::readPath (
          $this->getConfig ('pages-dir') . (
            DIRECTORY_SEPARATOR . $route . $alt
          )
        );

        if (is_file ($viewPath)) {
          return $viewPath;
        }
      }
    }

    private final function resolveController ($route) {
      $alts = requires ('<trouter>/ealts');

      foreach ( $alts as $alt ) {
        $viewPath = module::readPath (
          $this->getConfig ('controllers-dir') . (
            DIRECTORY_SEPARATOR . $route . $alt
          )
        );

        if (is_file ($viewPath)) {
          return $viewPath;
        }
      }
    }
  }}
}
