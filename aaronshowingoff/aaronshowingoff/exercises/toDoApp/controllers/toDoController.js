(function () {

    var toDoController = function ($scope, toDoListFactory) {

    //fill with init function
        $scope.todos = [];
        $scope.markAll = true;
        $scope.toggleText = 'Mark All Finished';
        
        function init() {
            $scope.todos = toDoListFactory.getToDoListItems();
        }
        
        init();
        
        //add new item
        $scope.addTodo = function () {
            if (event.keyCode === 13 && $scope.todoText) {
                $scope.todos.push({ text: $scope.todoText, done: false });
                $scope.todoText = '';
            }
        };
        
        //returns not false essentially
        $scope.isTodo = function () {
            return $scope.todos.length > 0;
        };
        
        $scope.enterEditMode = function () {
            $(event.target).closest("LI").addClass("editing");
            //put focus on <input>
            //$(event.target).children(".edit").focus();
        };
        
        $scope.exitEditMode = function () {
            $(event.target).closest('LI').removeClass('editing');
        };
        
        //use enter key to leave in line editing
        $scope.commitEdit = function (todo) {
            if (event.keyCode === 13 && todo.text) {
                $scope.exitEditMode();
            }
        };
        
        $scope.remaining = function () {
            var count = 0;
            angular.forEach($scope.todos, function (todo) {
                count += todo.done ? 0 : 1;
            });
            return count;
        };

        $scope.hasDone = function () {
            return ($scope.todos.length !== $scope.remaining());
        };

        $scope.itemText = function () {
            return ($scope.todos.length - $scope.remaining() > 1) ? "items" : "item";
        };

        $scope.toggleMarkAll = function () {
            angular.forEach($scope.todos, function (todo) {
                todo.done = $scope.markAll;
            });
            //ARM switch toggle and toggleText
            $scope.markAll = !$scope.markAll;
            if ($scope.markAll === false) {
                $scope.toggleText = 'Mark All Unfinished';
            } else {
                $scope.toggleText = 'Mark All Finished';
            }
        };

        $scope.clear = function () {
            var oldTodos = $scope.todos;
            $scope.todos = [];
            angular.forEach(oldTodos, function (todo) {
                if (!todo.done) {
                    $scope.todos.push(todo);
                }
            });
        };
        
    };

    //protect against minification
    toDoController.$inject = ['$scope', 'toDoListFactory'];

    angular.module('listMakeApp')
        .controller('toDoController', toDoController);

}());