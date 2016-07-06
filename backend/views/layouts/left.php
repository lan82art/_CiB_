<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="\images\logo-small.gif" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Username</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'Users', 'url' => ['/user/index']],
                    ['label' => 'Orders', 'url' => ['/order/index']],
                    ['label' => 'Товары', 'items' => [
                        ['label' => 'Товары', 'url' => ['/goods/index']],
                        ['label' => 'Категории', 'url' => ['/goods-category/index']],
                        ['label' => 'Отправка', 'url' => ['/goods-sending/index']],
                    ]],
                    ['label' => 'Сатьи', 'items' => [
                        ['label' => 'Список статей', 'url' => ['/articles/index']],
                        ['label' => 'Категории статей', 'url' => ['/articles-category/index']],
                    ]],
                ],
            ]
        ) ?>

    </section>

</aside>
