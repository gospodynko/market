<template>
    <header>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">АгроЯрд</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/">
                                <i class="glyphicon glyphicon-dashboard"></i>&nbsp;Admin panel
                    </a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="glyphicon glyphicon-briefcase"></i>&nbsp;Меню <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/admin/products">
                                        <i class="glyphicon glyphicon-menu-right"></i>&nbsp;Продукти
                            </a>
                                </li>
                                <li>
                                    <a href="/admin/user-products">
                                        <i class="glyphicon glyphicon-menu-right"></i>&nbsp;Продукти користувачiв
                            </a>
                                </li>
                                <li>
                                    <a href="/admin/orders">
                                        <i class="glyphicon glyphicon-menu-right"></i>&nbsp;Замовлення
                            </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="/admin/producers">
                                        <i class="glyphicon glyphicon-menu-right"></i>&nbsp;Виробники
                            </a>
                                </li>
                                <li>
                                    <a href="/dashboard/categories">
                                        <i class="glyphicon glyphicon-menu-right"></i> Категорiї
                            </a>
                                </li>
                                <li>
                                    <a href="/admin/banner">
                                        <i class="glyphicon glyphicon-menu-right"></i>&nbsp;Баннери
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/deliveries">
                                        <i class="glyphicon glyphicon-menu-right"></i>&nbsp;Доставка
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/payments">
                                        <i class="glyphicon glyphicon-menu-right"></i>&nbsp;Оплата
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/shops">
                                        <i class="glyphicon glyphicon-menu-right"></i>&nbsp;Магазины
                                    </a>
                                </li>
                                <li>
                                    <a href="/admin/moderation">
                                        <i class="glyphicon glyphicon-menu-right"></i>&nbsp;Модерация
                                    </a>
                                </li>
                    </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script type="text/babel">
    export default{
        data(){
            return {

            }
        }
    }
</script>