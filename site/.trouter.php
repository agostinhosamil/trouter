<?php

$path = requires ('php-module-path');

$module->exports = array (
  'App Dir' => $path->resolve ('~', 'app')
);
