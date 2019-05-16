var app = angular.module('ToDoApp', []);

app.directive('ngConfirmClick', [
    function () {
        return {
            link: function (scope, element, attr) {
                var msg = attr.ngConfirmClick || "Are you sure?";
                var clickAction = attr.confirmedClick;
                element.bind('click', function (event) {
                    if (window.confirm(msg)) {
                        scope.$eval(clickAction)
                    }
                });
            }
        };
    }]);

app.controller('MainController', function ($scope) {
    $scope.tabs = {
        'taskTab': false,
        'categoryTab': false,
        'smsTab': false,
        'weatherTab': false,
        'usersTab': false
    };
    $scope.changeTab = function (tab) {
        angular.forEach($scope.tabs, function (key, value) {
            $scope.tabs[value] = false;
        });
        angular.forEach($scope.tabs, function (key, value) {
            if (value === tab) {
                $scope.tabs[tab] = true;

            }
        });
    }
});

app.controller('WeatherController', function ($scope, $http) {
    $scope.cityOf = '';
    $scope.country = '';
    $scope.temp = '';
    $scope.max = '';
    $scope.min = '';
    $scope.desc = '';
    $scope.city = '';
    $scope.res = '';
    $scope.getWeather = function () {
        $http.get("http://api.openweathermap.org/data/2.5/forecast?q=" + $scope.city + ",ir&&units=metric&lang=fa&APPID=6b9e397b3c89ea3c22a126dfcd156fd0")
            .then(
                function successCallback(response) {
                    $scope.res = response.data;
                    $scope.cityOf = $scope.res['city']['name']
                    $scope.country = $scope.res['city']['country']
                    $scope.temp = $scope.res['list'][0]['main']['temp']
                    $scope.min = $scope.res['list'][0]['main']['temp_min']
                    $scope.max = $scope.res['list'][0]['main']['temp_max']
                    $scope.desc = $scope.res['list'][0]['weather'][0]['description']
                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };
});

app.controller('SmsController', function ($scope, $http) {
    $scope.to = '';
    $scope.text = '';
    $scope.res = '';

    $scope.sendSms = function () {
        $http.get("https://api.kavenegar.com/v1/4B6B315A46574165534F67565A45574F634F6876584C79415053416978773768/sms/send.json?receptor=" + $scope.to + "&message=" + $scope.text)
            .then(
                function successCallback(response) {
                    $scope.res = response.data['return']['message'];
                    console.log($scope.res)
                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };
});


app.controller('UsersController', function ($scope, $http) {

    $scope.users = ''
    $scope.count = '20'
    $scope.getUsers = function () {
        $http.get("https://randomuser.me/api?results=" + $scope.count + "&nat=ir")
            .then(
                function successCallback(response) {
                    $scope.users = response.data['results'];
                    console.log($scope.users)
                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };

    $scope.getUsers()
});


app.controller('ToDoController', function ($scope, $http) {
    $scope.title = '';
    $scope.categoryId = '';
    $scope.tags = '';
    $scope.tasks = [];
    $scope.completedTasks = [];
    $scope.categories = []
    $scope.getCategories = function (id) {
        $http.get("http://localhost:8000/api/categories")
            .then(
                function successCallback(response) {

                    $scope.categoryId =  (response.data[0].id + "")
                    $scope.categories = response.data;
                    console.log( response.data[0].id);

                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };
    $scope.getCategories()


    $scope.getTasks = function () {
        $http.get("http://localhost:8000/api/tasks")
            .then(
                function successCallback(response) {
                    $scope.tasks = response.data;
                    console.log(response.data);
                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };
    $scope.getTasks();

    $scope.getCompletedTasks = function () {
        $http.get("http://localhost:8000/api/completed-tasks")
            .then(
                function successCallback(response) {
                    $scope.completedTasks = response.data;
                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };
    $scope.getCompletedTasks();

    $scope.submit = function () {
        $http.post("http://localhost:8000/api/tasks", {
            title: $scope.title,
            categoryId : $scope.categoryId,
            tags: $scope.tags
        })
            .then(
                function successCallback(response) {
                    $scope.getTasks()
                    $scope.title = ''
                    $scope.tags = ''
                },
                function errorCallback(response) {
                    console.log(response);
                }
            );
    };

    $scope.done = function (id) {
        $http.post("http://localhost:8000/api/done-task", {
            id: id
        })
            .then(
                function successCallback(response) {
                    $scope.getTasks();
                    $scope.getCompletedTasks();
                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };

    $scope.delete = function (id) {
        $http.delete("http://localhost:8000/api/tasks/" + id)
            .then(
                function successCallback(response) {
                    $scope.getTasks();
                    $scope.getCompletedTasks();
                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };
});
app.controller('CategoryController', function ($scope, $http) {

    $scope.title = ''
    $scope.categories = ''
    $scope.getCategories = function (id) {
        $http.get("http://localhost:8000/api/categories")
            .then(
                function successCallback(response) {
                    $scope.categories = response.data;
                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };
    $scope.getCategories()

    $scope.submit = function () {
        $http.post("http://localhost:8000/api/categories" , {
            title : $scope.title
        })
            .then(
                function successCallback(response) {
                    $scope.getCategories()
                    $scope.title = ''
                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };

    $scope.delete = function (id) {
        $http.delete("http://localhost:8000/api/categories/" + id)
            .then(
                function successCallback(response) {
                    $scope.getCategories();
                },
                function errorCallback(response) {
                    console.log("مشکلی در ارتباط با سرور پیش آمده است");
                }
            );
    };


});