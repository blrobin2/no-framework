<?php

return [
    ['GET', '/', ['Framework\Controllers\Homepage', 'show']],
    ['GET', '/{slug}', ['Framework\Controllers\Page', 'show']]
];