/*
 * Copyright (c) Ce code est la propriété de Jangolo Sarl, Cette application est EXCLUSIVEMENT réservée à un usage interne de l'entreprise qui n'a par conséquent donné AUCUNE autorisation à qui que ce soit. Vous vous exposez de ce fait à des poursuites judiciaires si vous disposez de ce code.
 */

/**
 * Created by bertrand.foffe on 17-1-2016.
 */
var app = angular.module('jangolo', []);


app.controller('mapCtrl', function ($scope, $http, $log) {


    $scope.title = '';
    $scope.points = [
        ['Lat', 'Long', 'Name'],
        [37.4232, -122.0853, 'Work'],
        [37.4289, -122.1697, 'University'],
        [37.6153, -122.3900, 'Airport'],
        [37.4422, -122.1731, 'Shopping']
    ];
    $scope.coordinates = [{latitude: null, longitude: null, label: null}];

    $scope.me = [
        ['Lat', 'Long', 'Name'],

    ];

    $scope.getMe = function (latitude, longitude) {
        console.log(latitude + " is lat in Get me & long is " + longitude);
        $scope.me.push([latitude, longitude, 'new point']);
        $scope.coordinates.push({latitude: latitude, longitude: longitude, label: "Point"});
    };


    $scope.loadMap = function () {
        google.charts.load("current", {packages: ["map"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable($scope.points);

            var map = new google.visualization.Map(document.getElementById('map_div'));
            map.draw(data, {showTip: true});
        }
    };
    $scope.loadMe = function () {
        $scope.getLocation();


    };

    function showPosition(position) {
        console.log("SHOWPOSITION() :" + 'in show position');
        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;

        $scope.getMe(latitude, longitude);
        var data = google.visualization.arrayToDataTable($scope.me);
        var map = new google.visualization.Map(document.getElementById('map_div'));
        map.draw(data, {showTip: true});
    }

    $scope.getLocation = function () {
        console.log("GETLOCATION() :" + 'in get location');
        if (navigator.geolocation) {
            console.log("GETLOCATION() :" + 'Getting current position');
            navigator.geolocation.getCurrentPosition(showPosition);
            console.log("GETLOCATION() :" + 'Finished getting current position');
        } else {
            console.log("GETLOCATION() :" + "Geolocation is not supported by this browser.");
        }
    }


});


app.controller('productModalCtrl', function ($scope, $http, $log) {
    $scope.quantity = 1;
    $scope.unit_price = 0;
    $scope.total = $scope.quantity*$scope.unit_price;
    $scope.reduceQuantity = function () {
        if($scope.quantity>1){
            $scope.quantity = $scope.quantity - 1;
            $scope.total = $scope.quantity*$scope.unit_price;
        }

    };
    $scope.addQuantity = function () {

        $scope.quantity = $scope.quantity + 1;
        $scope.total = $scope.quantity*$scope.unit_price;
    };
    $scope.setTotal = function () {
        $scope.total = $scope.quantity*$scope.unit_price;
    }
});

app.controller('productCheckout', function ($scope, $http, $log) {
    $scope.paiement = 'pod';
    $scope.monet_visible = true;
    $scope.paypal_visible = true;
    $scope.pod_visible = false;

    $scope.change_payment = function () {
        if($scope.paiement=='momo'){
            $scope.monet_visible = false;
            $scope.pod_visible = true;
            $scope.paypal_visible = true;
        }
        else if($scope.paiement=='paypal'){
            $scope.paypal_visible = false;
            $scope.pod_visible = true;
            $scope.monet_visible = true;
        }
        else {
            $scope.monet_visible = true;
            $scope.pod_visible = false;
            $scope.paypal_visible = true;
        }

    }

});

app.controller('registerCtrl', function ($scope, $http, $log) {
    $scope.visibility = false;

    $scope.toggleVisibility = function () {
        $scope.visibility = !$scope.visibility;
    };

});


