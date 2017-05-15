var app = angular.module('editor', ['ngToast', 'ngAnimate','schemaForm'])
  .config(['ngToastProvider', function (ngToastProvider) {
    ngToastProvider.configure({
      animation: 'fade',
      horizontalPosition: 'left'
    });
  }])
  .service('authService', ['$rootScope', '$window', '$q', '$timeout', function ($rootScope, $window, $q, $timeout) {
    return {
      login: function (creds) {
        var defer = $q.defer();
        AuthRocket.authenticate({
          username: creds.username,
          password: creds.password
        }, function (response) {
          if (response.error) {
            defer.reject(response.error);
          } else {
            $window.sessionStorage.setItem('authtoken', response.token);

            $timeout(function () {
              defer.resolve({error: null, status: 'success'});
            });
          }
        });
        return defer.promise;
      },
      token: function () {
        return $window.sessionStorage.getItem('authtoken');
      }
    };
  }])
  .service('backendService', ['$http', 'authService', function ($http, authService) {
    var urlBase = "/action/";
    return {
      save: function (data) {
        return $http({
          url: urlBase + "save",
          method: 'POST',
          params: {token: authService.token()},
          data: data
        });
      },
      publish: function () {
        return $http({
          url: urlBase + "publish",
          method: 'POST',
          params: {token: authService.token()}
        });
      }
    }
  }])
  .controller('loginController', ['$scope', 'authService', 'ngToast', function ($scope, authService, ngToast) {
    $scope.token = authService.token();

    $scope.login = function () {
      if ($scope.loginForm.$valid) {
        var requestLogin = authService.login({
          username: $scope.username,
          password: $scope.password
        });

        requestLogin.catch(function (error) {
          ngToast.create({
            className: 'error',
            content: error
          });
        });
        requestLogin.then(function (status) {
          var token = authService.token();
          window.location = window.location.href + "?token=" + token;
        });
      } else {
        ngToast.create({
          className: 'error',
          content: "Looks like you have some errors with the form!"
        });
      }
    }
  }])
  .controller('formController', ['$scope', 'backendService', 'ngToast', function ($scope, backendService, ngToast) {
    $scope.formData = window.formData;
    $scope.canPublish = false;
    $scope.formSchema = window.schema.schema;
    $scope.form = window.schema.form;
    $scope.publishContent = function () {
      var status = backendService.publish();
      status.success(function () {
        $scope.canPublish = false;
        ngToast.create({
          content: 'Your content has been published. <a href="/">View Site</a>'
        });
        document.getElementById('iframe-content-page').contentWindow.location.reload();
      });
    };

    $scope.saveContent = function () {
      var status = backendService.save($scope.formData);
      status.success(function () {
        $scope.canPublish = true;
        ngToast.create({
          className: 'warning',
          content: 'Your content has been saved. You must publish your changes in order for them to go live.'
        });

        document.getElementById('iframe-content-page').contentWindow.location.reload();
      });
    };
  }]);



