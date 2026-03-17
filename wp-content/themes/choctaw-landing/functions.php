<?php
/**
 * The Functions
 *
 * @package ChoctawNation
 */

use ChoctawNation\Theme_Init;

// Include Theme Init
require_once __DIR__ . '/inc/theme/class-theme-init.php';
$theme = new Theme_Init();

// Include Bootscore Functions
require_once __DIR__ . '/inc/bootscore/theme-functions.php';
