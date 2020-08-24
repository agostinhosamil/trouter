<?php
# import whole the Trouter components inside
# the current scope.
# Bootstrapp php-modules
# Bootstrapp include-all
# Bootstrapp Trouter
require_once (dirname(__DIR__) . '/autoload.php');
# Configure the project root directory as
# the current's path to get it by the php
# module path reader
php\module::config ('Root Dir', __DIR__);
# [Trouter]
$trouter = requires ('@trouter');

$trouter->run();
