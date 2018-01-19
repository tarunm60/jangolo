/*
 * Copyright (c) Ce code est la propriété de Jangolo Sarl, Cette application est EXCLUSIVEMENT réservée à un usage interne de l'entreprise qui n'a par conséquent donné AUCUNE autorisation à qui que ce soit. Vous vous exposez de ce fait à des poursuites judiciaires si vous disposez de ce code.
 */

/**
 * Created by bertrand.foffe on 17-1-2016.
 */
var app = angular.module('chickenApp', []);

app.controller('chickenCtrl', function ($scope, $http, $sce, $log) {


    //Form behaviour
    $scope.displayform = true;
    $scope.server_response = "";

    //Form fields
    $scope.unit_price = 2800;
    $scope.quantity = 5;
    $scope.cleaning_fee = 0;
    $scope.transport_fee = 0;
    $scope.total_bill = 0;
    $scope.period = '';
    $scope.poids = {value: 1.8, poids: '', increment: 0};
    $scope.profil = {profil: '', fee: 0};
    $scope.telephone = '';
    $scope.date = new Date();
    $scope.name = '';
    $scope.email = '';
    $scope.area = '';
    $scope.comment = '';
    $scope.newsletter = false;
    $scope.reduction = 0;


    // Calculated values
    $scope.calculated_price = $scope.unit_price;
    $scope.calculated_total = $scope.calculated_price * $scope.quantity.quantity;

    $scope.periode_list = ['Matinee', 'Apres Midi', 'Soiree'];
    $scope.poids_list = [
        {value: 1.8, poids: '1.8 kg', increment: 0},
        {value: 2.0, poids: '2.0 Kg', increment: 200},
        {value: 2.2, poids: '2.2 Kg', increment: 300},
        {value: 2.5, poids: '2.5 Kg', increment: 500},
        {value: 3, poids: '3.0 Kg', increment: 900},
    ];
    $scope.profil_list = [{profil: 'Vivant', fee: 0},
        {profil: 'Juste après nettoyage', fee: 100},
        {profil: 'Nettoyé & congelé', fee: 150}];
    $scope.area_list = ['Bonamoussadi', 'Makepe', 'Logpom', 'Kotto','Deido', 'Akwa','Cité des palmiers'];

    //Functions
    $scope.calculate = function () {
        $scope.apply;
        $scope.transport_fee = 1000;
        $scope.checkValidForm();
        $scope.cleaning_fee = ($scope.quantity * $scope.profil.fee);
        $scope.update_reductionPrice();
        $scope.calculated_price = ($scope.unit_price + ($scope.unit_price * $scope.reduction) + $scope
            .poids.increment );
        $scope.calculated_total = (($scope.calculated_price * $scope.quantity) + $scope.cleaning_fee);
        $scope.is_above_stock();
        $scope.is_below_minimum();
        $scope.total_bill = ($scope.calculated_total + $scope.transport_fee);

        $scope.apply;
    };

    $scope.update_reductionPrice = function () {
        if ($scope.quantity < 5)
            $scope.reduction = 0;
        else if ($scope.quantity >= 0 & $scope.quantity < 10)
            $scope.reduction = 0;
        else if ($scope.quantity >= 10 & $scope.quantity < 30)
            $scope.reduction = -0.02;
        else if ($scope.quantity >= 30 & $scope.quantity < 60)
            $scope.reduction = -0.03;
        else if ($scope.quantity >= 60 & $scope.quantity < 100)
            $scope.reduction = -0.05;
        else if ($scope.quantity >= 100 & $scope.quantity < 300)
            $scope.reduction = -0.08;
        else if ($scope.quantity >= 300 & $scope.quantity < 800)
            $scope.reduction = -0.09;
        else if ($scope.quantity >= 800)
            $scope.reduction = -0.1;
    };

    $scope.form_is_valid = false;

    $scope.checkValidForm = function () {

        $scope.form_is_valid = false;
    };

    $scope.getRemaining = function () {

        $http.get('/api/get_chicken_ordered/').success(function (data, status, headers, config) {
            $scope.remaining = 2000 - data;
//                alert(data)

        })
    };

    $scope.remaining = $scope.getRemaining();

    $scope.is_above_stock = function () {
        return $scope.remaining < $scope.quantity;
    };

    $scope.is_below_minimum = function () {
        return $scope.quantity < 5;
    };
    $scope.saveOrder = function (form) {
//            alert(form.toString());
        if ($scope.name !== '' & $scope.telephone !== '') {

            var dataObject = {
                price: $scope.calculated_price,
                date: new Date(),
                delivery_date: $scope.date,
                quantity: $scope.quantity,
                cleaning_fee: $scope.cleaning_fee,
                transport_fee: $scope.transport_fee,
                delivery_period: $scope.period,
                weight: $scope.poids.value,
                profile: $scope.profil.profil,
                telephone: $scope.telephone,
                email: $scope.email,
                area: $scope.area,
                name: $scope.name,
                message: $scope.comment,
                location: $scope.location
            };
            $http.post('/api/save_chicken_order', dataObject).success(function (data, status, headers, config) {

                $scope.displayform = false;
                $scope.server_response = $sce.trustAsHtml("<h2>Félicitation !!! </h2> vous venez de passer votre " +
                    "première commande  sur " +
                    "Jangolo Farm.<br> Nous vous contacterons dans les heures qui suivent pour confirmer votre " +
                    "commande.<br><br>Pour toute question, vous pouvez nous contacter : <h3> Téléphone : 6 8047 5529</h3><h3>Email : farm@jangolo.cm</h3>Merci pour la confiance que vous nous accordez. ");
                $scope.remaining = $scope.getRemaining();
            }).error(function (data, status, headers, config) {
                alert("failed" + JSON.stringify(data) + status)
            });
        }
    }


});

app.controller('listProductsCtrl', function ($scope, $http, $sce, $log) {


    $scope.list_products;
    $scope.list_orders=[];
    $scope.transport_fee = 500;
    $scope.total_bill=0;
    $scope.validate_form = false;
    $scope.area_list = ['Bonamoussadi', 'Makepe', 'Logpom', 'Kotto','Logbessou', 'Cité des palmiers','Deido','Bonanjo','Bonapriso'];
    $scope.periode_list = ['Matinée', 'Après Midi', 'Soirée'];
    $scope.telephone = '';
    $scope.date = new Date();
    $scope.name = '';
    $scope.email = '';
    $scope.area = '';
    $scope.comment = '';
    $scope.location='';
    $scope.show_progress = false;
    $scope.show_order_button = true;

    /**
     * Functions
     */
    $scope.loadProducts = function () {

        $http.get('/api/products/').success(function (data, status, headers, config) {
            $scope.list_products =data;
            for(var i=0;i<$scope.list_products.length;i++)
            {
                $scope.list_products[i].quantity =1;
                $scope.list_products[i].addButton =true;
            }
        })
    };
    $scope.addQuantity = function(value){
        value.quantity++;
        $scope.totalBill();
    }
    $scope.showValidationForm = function(){
        $scope.show_order_button = false;
        $scope.validate_form=true;
    }
    $scope.totalBill = function(){
        $scope.total_bill =0;
        for(var i=0;i<$scope.list_orders.length;i++)
        {
            $scope.total_bill += ($scope.list_orders[i].quantity * $scope.list_orders[i].marge) ;
            $scope.total_bill += $scope.transport_fee;
        }
    }
    $scope.addOderItem = function(value){

        //$scope.list_orders.splice($scope.list_orders.indexOf(value), 1);
        value.addButton=false;
        $scope.list_orders.push(value);
        $scope.totalBill();
    }
    $scope.removeOrder = function(value){

        value.addButton = true;
        $scope.list_orders.splice($scope.list_orders.indexOf(value), 1);
        $scope.totalBill();
    }
    $scope.substractQuantity = function(value){
        if(value.quantity>0)
            value.quantity--;
        $scope.totalBill();
    }


    $scope.validateQuantity = function(value){
        if(value.quantity<0 || Number.isInteger(value.quantity))
            value.quantity=1;
        $scope.totalBill();
    }

    $scope.saveOrder = function () {
        if ($scope.name !== '' & $scope.telephone !== '') {
            $scope.validate_form = false;
            $scope.show_progress =true;
            var dataObject = {
                orders:$scope.list_orders,
                price: 500,
                date: new Date(),
                delivery_date: $scope.date,
                transport_fee: $scope.transport_fee,
                delivery_period: $scope.period,
                telephone: $scope.telephone,
                email: $scope.email,
                area: $scope.area,
                name: $scope.name,
                message: $scope.comment,
                location: $scope.location
            };
            $http.post('/api/save_farm_order', dataObject).success(function (data, status, headers, config) {

                $scope.show_progress =false;
                $scope.server_response = $sce.trustAsHtml("<h2>Félicitation !!! </h2>Vous venez de passer votre " +
                    "première commande  sur " +
                    "Jangolo Farm.<br> Nous vous contacterons dans les heures qui suivent pour confirmer votre " +
                    "commande.<br><br>Pour toute question, vous pouvez nous contacter : <h3> Téléphone : 6 8047 5529</h3><h3>Email : farm@jangolo.cm</h3>Merci pour la confiance que vous nous accordez. ");
            }).error(function (data, status, headers, config) {
                alert("failed" + JSON.stringify(data) + status)
            });
        }
    }

    $scope.loadProducts();

})