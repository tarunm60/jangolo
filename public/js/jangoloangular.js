/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 54);
/******/ })
/************************************************************************/
/******/ ({

/***/ 14:
/***/ (function(module, exports) {

/*
 * Copyright (c) Ce code est la propriété de Jangolo Sarl, Cette application est EXCLUSIVEMENT réservée à un usage interne de l'entreprise qui n'a par conséquent donné AUCUNE autorisation à qui que ce soit. Vous vous exposez de ce fait à des poursuites judiciaires si vous disposez de ce code.
 */

/**
 * Created by bertrand.foffe on 17-1-2016.
 */
var app = angular.module('jangolo', []);

app.controller('mapCtrl', function ($scope, $http, $log) {

    $scope.title = '';
    $scope.points = [['Lat', 'Long', 'Name'], [37.4232, -122.0853, 'Work'], [37.4289, -122.1697, 'University'], [37.6153, -122.3900, 'Airport'], [37.4422, -122.1731, 'Shopping']];
    $scope.coordinates = [{ latitude: null, longitude: null, label: null }];

    $scope.me = [['Lat', 'Long', 'Name']];

    $scope.getMe = function (latitude, longitude) {
        console.log(latitude + " is lat in Get me & long is " + longitude);
        $scope.me.push([latitude, longitude, 'new point']);
        $scope.coordinates.push({ latitude: latitude, longitude: longitude, label: "Point" });
    };

    $scope.loadMap = function () {
        google.charts.load("current", { packages: ["map"] });
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable($scope.points);

            var map = new google.visualization.Map(document.getElementById('map_div'));
            map.draw(data, { showTip: true });
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
        map.draw(data, { showTip: true });
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
    };
});

app.controller('productModalCtrl', function ($scope, $http, $log) {
    $scope.quantity = 1;
    $scope.unit_price = 0;
    $scope.total = $scope.quantity * $scope.unit_price;
    $scope.reduceQuantity = function () {
        if ($scope.quantity > 1) {
            $scope.quantity = $scope.quantity - 1;
            $scope.total = $scope.quantity * $scope.unit_price;
        }
    };
    $scope.addQuantity = function () {

        $scope.quantity = $scope.quantity + 1;
        $scope.total = $scope.quantity * $scope.unit_price;
    };
    $scope.setTotal = function () {
        $scope.total = $scope.quantity * $scope.unit_price;
    };
});

app.controller('productCheckout', function ($scope, $http, $log) {
    $scope.paiement = 'pod';
    $scope.monet_visible = true;
    $scope.paypal_visible = true;
    $scope.pod_visible = false;

    $scope.change_payment = function () {
        if ($scope.paiement == 'momo') {
            $scope.monet_visible = false;
            $scope.pod_visible = true;
            $scope.paypal_visible = true;
        } else if ($scope.paiement == 'paypal') {
            $scope.paypal_visible = false;
            $scope.pod_visible = true;
            $scope.monet_visible = true;
        } else {
            $scope.monet_visible = true;
            $scope.pod_visible = false;
            $scope.paypal_visible = true;
        }
    };
});

app.controller('registerCtrl', function ($scope, $http, $log) {
    $scope.visibility = false;

    $scope.toggleVisibility = function () {
        $scope.visibility = !$scope.visibility;
    };
});

/***/ }),

/***/ 54:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(14);


/***/ })

/******/ });