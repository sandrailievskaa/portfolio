<?php

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

/**
 * Renders the single portfolio route to a static index.html.
 * Used for the GitHub Pages export — no PHP runs on the served site,
 * this just boots Laravel once, ahead of time, and freezes the output.
 *
 * Usage: php scripts/export-static.php <output-file>
 */

require __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);
$request = Request::create('/', 'GET');
$response = $kernel->handle($request);

if ($response->getStatusCode() !== 200) {
    fwrite(STDERR, "Export failed: route returned status {$response->getStatusCode()}\n");
    fwrite(STDERR, $response->getContent()."\n");
    exit(1);
}

$outputFile = $argv[1] ?? __DIR__.'/../dist/index.html';

if (! is_dir(dirname($outputFile))) {
    mkdir(dirname($outputFile), 0755, true);
}

file_put_contents($outputFile, $response->getContent());

$kernel->terminate($request, $response);

fwrite(STDOUT, "Exported static HTML to {$outputFile}\n");
