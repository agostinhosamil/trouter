<?php
/**
 * @version 2.0
 * @author Sammy
 *
 * @keywords Samils, ils, php framework
 * -----------------
 * @namespace \
 * - Autoload, application dependencies
 */
if ( !function_exists ('asset') ) {
/**
 * @function asset
 * Base internal function for the
 * Sami\Cli module command 'requires'.
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
 */
function asset ($path = '') {
	return (string)( '/' . preg_replace ('/^\/+/', '', $path) );
}}
