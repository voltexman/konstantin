<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Константин Джоган</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Магазин', 'options' => ['class' => 'header']],
                    ['label' => 'Категории', 'icon' => 'file-code-o', 'url' => ['category/index']],
                    ['label' => 'Товары', 'icon' => 'dashboard', 'url' => ['/debug']],
                ],
            ]
        ) ?>

    </section>

</aside>
