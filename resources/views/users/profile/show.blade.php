@extends('layout.farm')

@section('content')
    <div class="row">
    <div class="col-md-6 col-lg-6">
        <div class="farm_title">
            <h3 class="panel-title">
                {{$user->fullname()}}
            </h3>
        </div>
        <table class="table">
            <tr>
                <td>Firstname</td>
                <td><?php echo $user->firstname; ?></td>
            </tr>
            <tr>
                <td>Lastname</td>
                <td><?php echo $user->lastname; ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php echo $user->username; ?></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><?php echo $user->mobile; ?></td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td><?php echo $user->username; ?></td>
            </tr>
            <tr>
                <td>Website</td>
                <td><?php echo $user->website; ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>

        </table>


    </div>

    <?php
    if (count($orders) > 0) {
    ?>
    <div class="col-md-6 col-lg-6">
        <div class="farm_title">
            <h3 class="panel-title">
                Mes commandes (6 dernières)
            </h3>
        </div>

        <table class="table">
            <?php

            foreach ($orders as $order) {
            ?>
            <tr>
                <td><?php echo date('d F Y', strtotime($order->date)); ?></td>
                <td><?php echo $order->reference; ?></td>
                <td><?php echo strtoupper($order->status); ?></td>
                <td align="right">{{number_format($order->value(), 0)}} F CFA</td>
            </tr>

            <?php }
            ?>
        </table>

    </div>
    <?php } ?>

</div>
<div class="row">
    <?php

    if (count($orders) > 0) {
    ?>
    <div class="col-md-6 col-lg-6">
        <div class="farm_title">
            <h3 class="panel-title">
                Mes Produits
            </h3>
        </div>

        <table class="table">
            <?php

            foreach ($products as $product) {
            ?>
            <tr>
                <td><?php echo $product->title; ?></td>
                <td></td>
                <td align="right">{{number_format($product->pivot->price, 0)}} F</td>
            </tr>

            <?php }
            ?>
        </table>

    </div>
    <?php } ?>

    <?php

    if (count($products) > 0) {
    ?>
    <div class="col-md-6 col-lg-6">
        <div class="farm_title">
            <h3 class="panel-title">
                Mes ventes
            </h3>
        </div>

        <table class="table">
            <?php

            foreach ($products as $product) {
            ?>
            <tr>
                <td><?php echo $product->title; ?></td>
                <td><?php if ($product->brand)
                        echo $product->orderitems->find_all()->count(); ?></td>
                <!--                    <td align="right">-->
            <?php //echo Num::format($order->getSupplierPrice($user->id)['price'], 0) .
            //                            " F CFA"; ?><!--</td>-->
            </tr>

            <?php }
            ?>
        </table>

    </div>
    <?php } ?>

</div>

@endsection