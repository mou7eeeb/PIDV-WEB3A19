<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/candidature' => [[['_route' => 'app_candidature_index', '_controller' => 'App\\Controller\\CandidatureController::index'], null, ['GET' => 0], null, true, false, null]],
        '/candidature/new' => [[['_route' => 'app_candidature_new', '_controller' => 'App\\Controller\\CandidatureController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/dashboard' => [[['_route' => 'app_dashboard', '_controller' => 'App\\Controller\\DashboardController::index'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\HomeController::index'], null, null, null, false, false, null]],
        '/mission' => [[['_route' => 'app_mission_index', '_controller' => 'App\\Controller\\MissionController::index'], null, ['GET' => 0], null, true, false, null]],
        '/mission/new' => [[['_route' => 'app_mission_new', '_controller' => 'App\\Controller\\MissionController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/test' => [[['_route' => 'test_adminlte', 'template' => 'test.html.twig', '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController::template'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/qr\\-code/([^/]++)/([\\w\\W]+)(*:35)'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:73)'
                    .'|wdt/([^/]++)(*:92)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:133)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:170)'
                                .'|router(*:184)'
                                .'|exception(?'
                                    .'|(*:204)'
                                    .'|\\.css(*:217)'
                                .')'
                            .')'
                            .'|(*:227)'
                        .')'
                    .')'
                .')'
                .'|/candidature/([^/]++)(?'
                    .'|(*:262)'
                    .'|/(?'
                        .'|qrcode(*:280)'
                        .'|edit(*:292)'
                    .')'
                    .'|(*:301)'
                .')'
                .'|/mission/(?'
                    .'|([^/]++)(?'
                        .'|(*:333)'
                        .'|/(?'
                            .'|pdf(*:348)'
                            .'|edit(*:360)'
                        .')'
                        .'|(*:369)'
                    .')'
                    .'|search(*:384)'
                    .'|advanced\\-search(*:408)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => 'qr_code_generate', '_controller' => 'Endroid\\QrCodeBundle\\Controller\\GenerateController'], ['builder', 'data'], null, null, false, true, null]],
        73 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        92 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        133 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        170 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        184 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        204 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        217 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        227 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        262 => [[['_route' => 'app_candidature_show', '_controller' => 'App\\Controller\\CandidatureController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        280 => [[['_route' => 'app_candidature_qrcode', '_controller' => 'App\\Controller\\CandidatureController::showQrCode'], ['id'], ['GET' => 0], null, false, false, null]],
        292 => [[['_route' => 'app_candidature_edit', '_controller' => 'App\\Controller\\CandidatureController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        301 => [[['_route' => 'app_candidature_delete', '_controller' => 'App\\Controller\\CandidatureController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        333 => [[['_route' => 'app_mission_show', '_controller' => 'App\\Controller\\MissionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        348 => [[['_route' => 'app_mission_pdf', '_controller' => 'App\\Controller\\MissionController::generatePdf'], ['id'], ['GET' => 0], null, false, false, null]],
        360 => [[['_route' => 'app_mission_edit', '_controller' => 'App\\Controller\\MissionController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        369 => [[['_route' => 'app_mission_delete', '_controller' => 'App\\Controller\\MissionController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        384 => [[['_route' => 'app_mission_search', '_controller' => 'App\\Controller\\MissionSearchController::search'], [], ['GET' => 0], null, false, false, null]],
        408 => [
            [['_route' => 'app_mission_advanced_search', '_controller' => 'App\\Controller\\MissionSearchController::advancedSearch'], [], ['POST' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
