
@extends('layout.farm')
@section('content')
<?php

session_start();
// eventuellement vider le panier
if (isset($_GET["vider"]))
{
    session_unset();
}?>
<!DOCTYPE html>
<html>
<body>

<h3>Mon panier</h3>

<a href="{{route('cart.showbasket')}}?vider=1">Vider le panier</a>

<hr>

<?php
//afficher le contenu de la session
if (isset($value))
{
    foreach ($value as $values){
        print $values . "<br>";
    }

}
/*if (isset($_SESSION["list"]))
{
    foreach ($_SESSION["list"] as $value){
        print $value . "<br>";
    }

}*/
?>

<hr>

<a href="{{url('http://127.0.0.1:8000')}}">Continue shopping</a>
<div class="container">
    <div class="row">
        <div class="col-xs-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <div class="col-xs-6">
                                <h5><span class="glyphicon glyphicon-shopping-cart"></span> Panier</h5>
                            </div>
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-primary btn-sm btn-block">
                                    <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
                        </div>
                        <div class="col-xs-4">
                            <h4 class="product-name"><strong>Product name</strong></h4><h4><small>Product description</small></h4>
                        </div>
                        <div class="col-xs-6">
                            <div class="col-xs-6 text-right">
                                <h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control input-sm" value="1">
                            </div>
                            <div class="col-xs-2">
                                <button type="button" class="btn btn-link btn-xs">
                                    <span class="glyphicon glyphicon-trash"> </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
                        </div>
                        <div class="col-xs-4">
                            <h4 class="product-name"><strong>Product name</strong></h4><h4><small>Product description</small></h4>
                        </div>
                        <div class="col-xs-6">
                            <div class="col-xs-6 text-right">
                                <h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control input-sm" value="1">
                            </div>
                            <div class="col-xs-2">
                                <button type="button" class="btn btn-link btn-xs">
                                    <span class="glyphicon glyphicon-trash"> </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="text-center">
                            <div class="col-xs-9">
                                <h6 class="text-right">Added items?</h6>
                                @foreach($orderitem as $key => $value)
                                    {{$value->id }}
                                @endforeach

                            </div>
                            <div class="col-xs-3">
                                <button type="button" class="btn btn-default btn-sm btn-block">

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-xs-9">
                            <h4 class="text-right">Total <strong>$50.00</strong></h4>
                        </div>
                        <div class="col-xs-3">
                            <button type="button" class="btn btn-success btn-block">
                                Checkout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>



