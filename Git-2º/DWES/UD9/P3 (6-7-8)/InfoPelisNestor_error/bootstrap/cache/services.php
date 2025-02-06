<?php return array (
  'providers' => 
  array (
    0 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
    1 => 'Illuminate\\Cache\\CacheServiceProvider',
    2 => 'Laravel\\Pail\\PailServiceProvider',
    3 => 'Laravel\\Sail\\SailServiceProvider',
    4 => 'Laravel\\Tinker\\TinkerServiceProvider',
    5 => 'Carbon\\Laravel\\ServiceProvider',
    6 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    7 => 'Termwind\\Laravel\\TermwindServiceProvider',
    8 => 'App\\Providers\\MoviesImagesPathServiceProvider',
    9 => 'App\\Providers\\AppServiceProvider',
    10 => 'App\\Providers\\MoviesImagesPathServiceProvider',
  ),
  'eager' => 
  array (
    0 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
    1 => 'Laravel\\Pail\\PailServiceProvider',
    2 => 'Carbon\\Laravel\\ServiceProvider',
    3 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    4 => 'Termwind\\Laravel\\TermwindServiceProvider',
    5 => 'App\\Providers\\MoviesImagesPathServiceProvider',
    6 => 'App\\Providers\\AppServiceProvider',
    7 => 'App\\Providers\\MoviesImagesPathServiceProvider',
  ),
  'deferred' => 
  array (
    'cache' => 'Illuminate\\Cache\\CacheServiceProvider',
    'cache.store' => 'Illuminate\\Cache\\CacheServiceProvider',
    'cache.psr6' => 'Illuminate\\Cache\\CacheServiceProvider',
    'memcached.connector' => 'Illuminate\\Cache\\CacheServiceProvider',
    'Illuminate\\Cache\\RateLimiter' => 'Illuminate\\Cache\\CacheServiceProvider',
    'Laravel\\Sail\\Console\\InstallCommand' => 'Laravel\\Sail\\SailServiceProvider',
    'Laravel\\Sail\\Console\\PublishCommand' => 'Laravel\\Sail\\SailServiceProvider',
    'command.tinker' => 'Laravel\\Tinker\\TinkerServiceProvider',
  ),
  'when' => 
  array (
    'Illuminate\\Cache\\CacheServiceProvider' => 
    array (
    ),
    'Laravel\\Sail\\SailServiceProvider' => 
    array (
    ),
    'Laravel\\Tinker\\TinkerServiceProvider' => 
    array (
    ),
  ),
);