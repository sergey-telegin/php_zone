<?php

return [
    '~^/hello/(.*)$~' => [\App\MyProject\Controllers\MainController::class, 'sayHello'],
    '~^/$~' => [\App\MyProject\Controllers\MainController::class, 'main'],
    '~^/bay/(.*)$~' => [\App\MyProject\Controllers\MainController::class, 'sayBay'],
    '~^/articles/(\d+)$~' => [\App\MyProject\Controllers\ArticlesController::class, 'view'],
];