<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>
            Подготовительные задания к курсу
        </title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
        <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">
            <div class="col-md-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Задание
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">

                            <?php
                                $statistic = [
                                    [
                                        'title' => 'My Tasks',
                                        'currentValue' => 130,
                                        'maxValue' => 500,
                                        'units' => false,
                                        'bg' => [
                                            'color' => 'fusion',
                                            'width' => 400
                                        ]
                                    ],
                                    [
                                        'title' => 'Transfered',
                                        'currentValue' => 440,
                                        'maxValue' => 1500,
                                        'units' => 'TB',
                                        'bg' => [
                                            'color' => 'success',
                                            'width' => 400
                                        ]
                                    ],
                                    [
                                        'title' => 'Bags Squashed',
                                        'currentValue' => 77,
                                        'maxValue' => 100,
                                        'units' => '%',
                                        'bg' => [
                                            'color' => 'info',
                                            'width' => 400
                                        ]
                                    ],
                                    [
                                        'title' => 'User Testing',
                                        'currentValue' => 7,
                                        'maxValue' => 8,
                                        'units' => 'days',
                                        'bg' => [
                                            'color' => 'primary',
                                            'width' => 400
                                        ]
                                    ],

                                ];


                                function getBG( $item )
                                {
                                    return 'bg-' . $item[ 'color' ] . '-' . $item[ 'width' ];
                                }
                            ?>

                            <?php foreach( $statistic as $item ): ?>
                            <div class="d-flex mt-2">
                                My Tasks
                                <span class="d-inline-block ml-auto">
                                    <?php
                                        if( $item[ 'units' ] )
                                            echo $item[ 'currentValue' ] . ' ' . $item[ 'units' ];
                                        else
                                            echo $item[ 'currentValue' ] . ' / ' . $item[ 'maxValue' ];
                                        ?>
                                </span>
                            </div>
                            <div class="progress progress-sm mb-3">
                                <div class="progress-bar <?= getBG( $item[ 'bg' ] ) ?>" role="progressbar" style="width: <?=  ( 100 / $item[ 'maxValue' ] ) * $item[ 'currentValue' ] ?>%;" aria-valuenow="<?=  ( 100 / $item[ 'maxValue' ] ) * $item[ 'currentValue' ] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <?php endforeach; ?>


                        </div>
                    </div>
                </div>
            </div>
        </main>
        

        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
        </script>
    </body>
</html>
