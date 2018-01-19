<?php session_start();?>
<div id="root">
    <div class="row">
        <div class="col-lg-12">
            <div class=""
                 style="border-left: 5px coral solid; padding-left: 15px; height: 30px; background: #e3e2e2; padding-top: 5px; margin-top: 5px
">
                <h3 class="panel-title">{!! $title !!}</h3>

            </div>
        </div>
    </div>
    <div class="row">
        <span class="glyphicon glyphicon-shopping-cart my-cart-icon" data-toggle="modal" data-target="#myModal">
                <span class="badge badge-notify my-cart-badge" v-if="typeof(order.items) != 'undefined'"
                      v-bind="order.items" v-text="order.items.length">
                </span>
        </span>
        <br/>

        <product-list></product-list>
    </div>

    <cart-order :order="order"></cart-order>


    <div class="container">


        <!-- Modal -->
        <div class="modal fade" id="mypopup" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Newsletters</h4>
                    </div>
                    <div class="modal-body">
                        <b>Voulez vous vous inscrire à la newsletters?</b>
                        <p>Souscrivez à la newsletter et ne ratez aucune offre exceptionnelle.</p>
                        {!! Form::open(['url' => '/newsletters/register/','method'=>'get','class'=>'form-input']) !!}
                        {!! Form::email('news',null,['placeholder' => 'Votre email','class'=>'form-input'],['required'],['height' => '15px']) !!}
                        {!! Form::submit('Je m inscris !', ['class'=>'btn btn-success'], ['id'=>'register']) !!}
                        <button type="button" data-dismiss="modal" class="btn btn-danger">Non Merci</button>
                        {!! Form::close() !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
if(!isset($_SESSION['id']))
{
?>
<script>
    $(window).on('load', function () {
        $('#mypopup').modal('show');
    });
</script>
<?php
}else {

 }
?>
