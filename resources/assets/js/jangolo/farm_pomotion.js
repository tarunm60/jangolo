/**
 * Created by bertrand.foffe on 17-1-2016.
 */
var app = angular.module('promotionApp', []);

app.controller('promoCtrl', function ($scope, $http, $sce, $log) {

    $scope.hide_section_1 = false;
    $scope.hide_section_2 = true;
    $scope.hide_section_3 = true;
    $scope.hide_section_4 = true;
    $scope.hide_section_5 = true;
    $scope.hide_section_6 = true;
    $scope.hide_section_7 = true;
    $scope.hide_section_8 = true;
    $scope.hide_section_9 = true;


    $scope.error_1_text = "Veillez sélectionner un quatier";
    $scope.error_1_hide = true;
    $scope.error_3_hide = true;
    $scope.error_2_text = "";
    $scope.error_3_text = "";


    $scope.oneToTwo = function () {


        if($scope.area=="")
            $scope.error_1_hide = false;
        else{
            $scope.hide_section_1 = true;
            $scope.hide_section_2 = false;
            $scope.error_1_hide = true;
        }
    };

    $scope.toError1 = function () {

        $scope.hide_section_2 = true;
        $scope.hide_error_1 = false;
        $scope.bodyStyle = {
            "background-color": "#c1272d"
        }
    };
    $scope.fromError1 = function () {

        $scope.hide_section_2 = false;
        $scope.hide_error_1 = true;
        $scope.bodyStyle = {
            "background-color": "#29ABE2"
        }
    };

    $scope.toError2 = function () {

        $scope.hide_section_3 = true;
        $scope.hide_error_2 = false;
        $scope.bodyStyle = {
            "background-color": "#c1272d"
        }
    };
    $scope.fromError2 = function () {

        $scope.hide_section_3 = false;
        $scope.hide_error_2 = true;
        $scope.bodyStyle = {
            "background-color": "#29ABE2"
        }
    };
    $scope.twoToThree = function () {

        if($scope.getTotal()!=0){

            $scope.hide_section_2 = true;
            $scope.hide_section_3 = false;
            $scope.error_3_text = "";
            $scope.error_3_hide = true;
        }
        else{

            $scope.error_3_text = "Définissez une quantité";
            $scope.error_3_hide = false;
        }


    };
    $scope.twoToOne = function () {

        $scope.hide_section_2 = true;
        $scope.hide_section_1 = false;
    };
    $scope.threeTofour = function () {

        if($scope.validation_delivery()){
            $scope.hide_section_3 = true;
            $scope.hide_section_4 = false;
            $scope.getdate()
        }
    };


    $scope.validation_delivery = function () {
        if($scope.name=='' && $scope.name.length<5){
            $scope.error_2_text = "Veillez préciser un nom valide.";
            return false;
        }
        if($scope.phone==null || $scope.phone.toString().length!=9){
            $scope.error_2_text = "Veillez préciser un numéro de téléphone valide.";
            return false;
        }

        if($scope.delivery_period==null){
            $scope.error_2_text = "Veillez préciser le moment de livraison.";
            return false;
        }
        if($scope.email==''){
            $scope.email = "-";
        }
        $scope.error_2_text ="";
        return true;

    }

    $scope.getTotal = function () {
        var total = 0;
        for (i = 0; i < $scope.list_products.length; i++) {
            if($scope.list_products[i].quantity != null)
            total += $scope.list_products[i].quantity * $scope.list_products[i].price;
        }
        return total;
    }

    $scope.getdate = function () {

        if($scope.delivery_date==null)
            $scope.delivery_date = new Date();

            var dateParts = $scope.delivery_date.toString().split("T");
            return dateParts[0];

    }

    $scope.threeToTwo = function () {

        $scope.hide_section_3 = true;
        $scope.hide_section_2 = false;
    };
    $scope.fourToFive = function () {

        $scope.saveOrder();

    };

    $scope.fourToThree = function () {

        $scope.hide_section_4 = true;
        $scope.hide_section_3 = false;
    };


    $scope.list_products = [
        {title: "Poulet nettoyé", quantity: null, price: 2500,marge:2500, size: "1,8", picture: "poulet_nettoye.png",id:1},
        {title: "Poulet vivant", quantity: null, price: 2400, marge:2400,size: "1,8", picture: "poulet_vivant.png",id:1}
        ];

    $scope.saveOrder = function () {
        if ($scope.name !== '' & $scope.phone !== '') {
            $scope.validate_form = false;
            $scope.show_progress = true;
            var dataObject = {
                orders: $scope.list_products,
                price: 0,
                date: new Date(),
                delivery_date: $scope.delivery_date,
                transport_fee: 0,
                delivery_period: $scope.delivery_period,
                telephone: $scope.telephone,
                email: $scope.email,
                area: $scope.area,
                name: $scope.name,
                message: $scope.comment,
                location: ""
            };
            $http.post('/api/save_farm_order', dataObject).success(function (data, status, headers, config) {

                $scope.hide_section_4 = true;
                $scope.hide_section_5 = false;
                return true
                // $scope.show_progress = false;
                // $scope.server_response = $sce.trustAsHtml("<h2>Félicitation !!! </h2>Vous venez de passer votre " +
                //     "première commande  sur " +
                //     "Jangolo Farm.<br> Nous vous contacterons dans les heures qui suivent pour confirmer votre " +
                //     "commande.<br><br>Pour toute question, vous pouvez nous contacter : <h3> Téléphone : 6 8047 5529</h3><h3>Email : farm@jangolo.cm</h3>Merci pour la confiance que vous nous accordez. ");
            }).error(function (data, status, headers, config) {
                // alert("failed" + JSON.stringify(data) + status)
                return false;
            });

        }
    }


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







});

app.controller('listProductsCtrl', function ($scope, $http, $sce, $log) {


    $scope.list_products;
    $scope.list_orders = [];
    $scope.transport_fee = 500;
    $scope.total_bill = 0;
    $scope.validate_form = false;
    $scope.area_list = ['Bonamoussadi', 'Makepe', 'Logpom', 'Kotto', 'Logbessou', 'Cité des palmiers', 'Deido', 'Bonanjo', 'Bonapriso'];
    $scope.periode_list = ['Matinée', 'Après Midi', 'Soirée'];
    $scope.telephone = '';
    $scope.date = new Date();
    $scope.name = '';
    $scope.email = '';
    $scope.area = '';
    $scope.comment = '';
    $scope.location = '';
    $scope.show_progress = false;
    $scope.show_order_button = true;

    /**
     * Functions
     */
    $scope.loadProducts = function () {

        $http.get('/api/products/').success(function (data, status, headers, config) {
            $scope.list_products = data;
            for (var i = 0; i < $scope.list_products.length; i++) {
                $scope.list_products[i].quantity = 1;
                $scope.list_products[i].addButton = true;
            }
        })
    };
    $scope.addQuantity = function (value) {
        value.quantity++;
        $scope.totalBill();
    }
    $scope.showValidationForm = function () {
        $scope.show_order_button = false;
        $scope.validate_form = true;
    }
    $scope.totalBill = function () {
        $scope.total_bill = 0;
        for (var i = 0; i < $scope.list_orders.length; i++) {
            $scope.total_bill += ($scope.list_orders[i].quantity * $scope.list_orders[i].marge);
            $scope.total_bill += $scope.transport_fee;
        }
    }
    $scope.addOderItem = function (value) {

        //$scope.list_orders.splice($scope.list_orders.indexOf(value), 1);
        value.addButton = false;
        $scope.list_orders.push(value);
        $scope.totalBill();
    }
    $scope.removeOrder = function (value) {

        value.addButton = true;
        $scope.list_orders.splice($scope.list_orders.indexOf(value), 1);
        $scope.totalBill();
    }
    $scope.substractQuantity = function (value) {
        if (value.quantity > 0)
            value.quantity--;
        $scope.totalBill();
    }


    $scope.validateQuantity = function (value) {
        if (value.quantity < 0 || Number.isInteger(value.quantity))
            value.quantity = 1;
        $scope.totalBill();
    }

    $scope.saveOrder = function () {
        if ($scope.name !== '' & $scope.telephone !== '') {
            $scope.validate_form = false;
            $scope.show_progress = true;
            var dataObject = {
                orders: $scope.list_orders,
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

                $scope.show_progress = false;
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