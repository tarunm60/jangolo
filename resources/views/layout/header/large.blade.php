<div class="visible-lg visible-md" style=" padding-top: 30px">
    <nav class="navbar navbar-fixed-top" style="background: #f5f5f5; min-height: 20px;">
        <div class="container">
            <div class="navbar-header col-lg-12">
                <div class="col-lg-4">
                    <p class="navbar-text" style="margin-top: 10px;"><i class="fa fa-whatsapp"></i> <b>+237
                            680475529</b></p>
                </div>
                <div class="col-lg-4" style="margin-top: 5px">
                    <a href="http://www.farmer.cm" target="_blank" title="Jangolo Farmer">
                        <img src="http://media.jangolo.cm/img/logo/logo_farmer.png" height="30"></a>
                    <a href="http://market.jangolo.cm" target="_blank" title="Jangolo market">
                        <img src="http://media.jangolo.cm/img/logo/Jangolo_Market_medium.png" height="30">
                    </a>
                </div>
                <div class="col-lg-4">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false" style="padding-top: 10px">
                                <i class="fa fa-user"></i>
                                @if(Auth::check())
                                    {{Auth::user()->fullname()}}
                                @else
                                    Mon Jangolo
                                @endif
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                @if(Auth::check())
                            <li>{{ Html::linkRoute('profile', 'Mon compte') }}</li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Déconnexion
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </li>
                                @else
                                    <li>{{ Html::linkRoute('login', 'Se connecter') }}</li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
    </nav>
    <div class="row">

        <div class="col-lg-3" style="text-align: left">
        <a href="/"><img src="http://media.jangolo.cm/img/logo/Jangolo_Farm_medium.png" width="150px"></a>
        </div>
        <div class="col-lg-5">
            {!! Form::open(['url' => '/product/search/','method'=>'get']) !!}
                <div class="input-group" style="margin-top: 15px">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Categories <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('product.category.index','search')}}">Tout</a> </li>


                            @foreach(App\Productcategory::activeCategories() as $category)
                                @if(isset($_GET['cat']) && $_GET['cat'] == $category->id)
                                    <li><a href="{{route('product.category.index',$category->id)}}">{{$category->title}}</a> </li>
                                @else
                                    <li>{{ Html::linkRoute('product.category.index', $category->title, array($category->id)) }} </li>
                                @endif
                            @endforeach

                        </ul>
                    </div>
                    {{ csrf_field() }}
                    <input type="text" class="form-control" placeholder="je cherche ..." name="s" value="{!! request('s','') !!}">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit" formaction="{{route('products.search','search')}}">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>

                </div>
            </form>
        </div>
        <div class="col-lg-4" align="right" style="padding-top:25px">


            <a href="{{route('farm.showbasket')}}" class="btn btn-lg main_menu" style="padding:5px 5px">
                <i class="glyphicon glyphicon-shopping-cart my-cart-icon"></i>
            </a>
        </div>
    </div>
    <div class="row"
         style="margin-top: 10px; margin-bottom: 10px; background: #8dc63f; height: 35px; color: #FFFFFF;">
        <div class="col-lg-1">
            <a href="" class="btn btn-lg main_menu" style="padding:5px 5px"><i class="fa fa-home" aria-hidden="true"></i></a>
        </div>
        <div class="col-lg-11" style="padding-top: 7px">
            @foreach(App\Productcategory::activeCategories() as $category)
                @if(isset($_GET['cat']))
                    <a href="" class="main_menu">{{$category->title}}</a> |
                @else
                    {{Html::linkRoute('product.category.index', $category->title, array($category->id),array('class'=>'main_menu')) }} |
                @endif
            @endforeach

        </div>
    </div>
</div>