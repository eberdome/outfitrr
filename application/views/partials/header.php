<!doctype html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Outfitrr v1.0</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href='https://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/assets/frontend/css/core.css">
    <link rel="stylesheet" href="/assets/frontend/css/demo.css">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular.min.js"></script>
    <script type="text/javascript">
        function ConsoleMenu($scope,$http) {
            $scope.categories = [];
            $http.get('/products/get_categories').success(function($data){ $scope.categories=$data; });
            $scope.this_category = function(item) {
                return item.selected == true;
            };

            $scope.lowercase = function(string){
                return angular.lowercase(string);
            };

            $scope.products = [];
            $http.get('/products/get_products').success(function($data){ $scope.products=$data; });
        }
    </script>
</head>

<body class="initial-page" ng-app>


    <a class="logo" href="/" title="logo">
        <h1 class="logo__text">Outfitrr v1.0</h1>
    </a>

    <nav class="nav" id="nav">
        <a class="nav__btn-open waypoint" href="javascript:void(0);">
            <span class="nav__btn-icon"></span>
        </a>
        <div class="nav-list-wrapper" id="nav-list-wrapper">
            <span class="nav__title">Console</span>
            <span class="nav__btn-close"></span>
            <div class="nav-list-container">
                <ul class="nav-list" ng-controller="ConsoleMenu">
                    <li class="nav-list__item" ng-repeat="category in categories">
                        <a class="nav-list__link nav-list__link--primary" href="#">
                            <img class="nav-list__icon" src="" alt="">
                            {{category.name}}
                        </a>
                        <ul class="nav-list__sub">
                            <li class="nav-list__item">
                                <input type="search" ng-model="q" placeholder="filter {{category.name|lowercase}}..." aria-label="filter friends" />
                            </li>
                            <li class="nav-list__item" ng-repeat="product in products | filter:category.name">
                                <a class="nav-list__link" href="#" data-menu="#">{{product.name}}</a>
                            </li>
                            <li ng-if="results.length === 0">
                                <strong>No results found...</strong>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>