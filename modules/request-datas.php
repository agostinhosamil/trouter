<?php

$requestUri = !isset ($_SERVER ['REQUEST_URI']) ? '' : (
  $_SERVER [ 'REQUEST_URI' ]
);

if (preg_match ('/^([^\?]+)/', $requestUri, $match)) {
  $requestRoute = preg_replace ('/(\/+)$/', '',
    preg_replace ('/^(\/+)/', '', $match [ 0 ])
  );

  $requestRoute = preg_replace ('/(\/\s*){2,}/', '/',
    preg_replace ('/^(\.+\/+)+/', '', $requestRoute)
  );

  $exports->route = ($requestRoute);
}
