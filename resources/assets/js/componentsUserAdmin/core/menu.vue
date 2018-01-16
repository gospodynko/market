<template>
    <div class="navbar-default sidebar nicescroll" role="navigation">
        <div class="sidebar-nav navbar-collapse ">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="ti-search"></i> </button>
                            </span>
                    </div>
                </li>
                <!--<li>-->
                    <!--<a href="/user/data" class="waves-effect">Личные данные</a>-->
                <!--</li>-->
                <li>
                    <a href="/shop/products" class="waves-effect">Магазини та продукти</a>
                </li>
                <li>
                    <a href="/shop/orders" class="waves-effect">Замовлення</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
</template>

<script type="text/babel">
    export default{
        data(){
            return{

            }
        }
    }
</script>