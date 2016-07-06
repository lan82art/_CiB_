<?php

use kartik\sidenav\SideNav;


/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-lg-3 col-md-4 col-xs-12">
                <?= SideNav::widget([
                    //'type' => SideNav::TYPE_SUCCESS,
                    'encodeLabels' => true,
                    'activateParents' => true,
                    'activateItems' => true,
                    'hideEmptyItems' => true,
                    'indItem' => '<i class="glyphicon glyphicon-menu-right"></i>&nbsp;',
                    'indMenuOpen' => '<i class="glyphicon glyphicon-circle-arrow-down"></i>',
                    'indMenuClose' => '<i class="glyphicon glyphicon-circle-arrow-right"></i>',
                    'heading' => false,
                    'items' => $menuItems,
                ])?>
            </div>
            <div class="col-lg-9 col-md-8 col-xs-12">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <h3 style="background-color: #990099; color: white; padding: 5px;">Хиты</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <h3 style="background-color: #990099; color: white; padding: 5px;">Новинки</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>
                </div>
            </div>
        </div>

    </div>
</div>
