

<?php
$categorys = get_category_to_menu();
echo '<pre>';
        print_r(session()->get('user_id'));
        echo '</pre>';
        //die;
?>

<header>
    <div class="navbar-wrapper">
        <div class="container-fluid">
            <nav class="navbar navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><img src="/img/logo-2.png"></a></a>
                    </div>

                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{route('portal') }}" class="">Home</a></li>


                            <li class="active"><a href="{{route('portal.aboutus') }}" class="">About US</a></li>

                            <li class="active"><a href="{{route('portal.article') }}" class=""> Article</a></li>

                            <li class="active"><a href="{{route('portal.media') }}" class="">Media Coverage</a></li>

                            <li class="active"><a href="{{route('portal.newsPortal') }}">News</a></li>
                            <li>

                                <ul id="nav">
                                    <li class="subMenu_Block"><a href="#">Products</a>
                                        <ul>
                                            @foreach($categorys as $category)
                                            <li><a href="{{route('portal.details', $category['id']) }}">{{$category['en_name']}} »</a>            
                                                <ul>
                                                    <?php $parents = get_parent_categoty($category); ?>
                                                    @foreach($parents as $parent)               
                                                    <li><a href="{{route('portal.details', $parent['id']) }} ">{{$parent['en_name']}}</a>

                                                    </li>
                                                    @endforeach
                                                </ul>
                                                @endforeach
                                            </li>
                                        </ul>
                                    </li>
                                </ul>



                            <li class="active"><a href="{{ route('contact_us.create') }}" class="">Contact US</a></li>
                            <li class="active"><a href="{{ route('portal_profile.edit') }}" class="">Profile</a></li>
                        </ul>
                        <ul class="nav navbar-nav pull-right login_block">
                            <li class=""><a href="{{route('portal.get_logout') }}">Logout</a></li>
                        </ul>
                    </div>
                </div>
        </div>
    </div>
</header>
</div>

</header>

<script>
    $(document).ready(function () {
        $('.dropdown-submenu a.test').on("click", function (e) {
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        });
    });
</script>
