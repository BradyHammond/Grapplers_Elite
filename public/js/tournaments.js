$('#add-menu').on('hidden.bs.modal', function(event) {
    $(this)
    .find("input,textarea")
        .val('')
        .end()
    .find("input[type=radio]")
        .prop("checked", "")
        .end()
    .find("#input-gi, #input-kids, #input-male")
        .prop("checked", true)
        .end();
});

/*$('#calendar').datepicker({
});*/

$('#input-calendar').datepicker({
});

$(".filter").click(function() {
    $("#filter-menu").slideToggle();
});

$(".expand-table").click(function() {
    if ($(this).children().hasClass("fa-caret-right")) {
        $(this).children().removeClass("fa-caret-right");
        $(this).children().addClass("fa-caret-down");

        $(this).parent().next().removeClass("hidden");
    }

    else {
        $(this).children().removeClass("fa-caret-down");
        $(this).children().addClass("fa-caret-right");

        var $this = $(this)
        setTimeout(function(){$this.parent().next().addClass("hidden");}, 160);
    }

    $(this).parent().next().children().children().collapse("toggle");
});

var tournament = angular.module('tournament', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

tournament.controller('tournamentController', function($scope, $http) {
    $scope.loading = true;
    $http.get("http://localhost:8000/tournaments/get")
    .then(function(response) {
        angular.forEach(response.data, function(value, key) {
            response.data[key].date = new Date(response.data[key].date.replace(/-/g,"/"));
        });
        $scope.tournaments = response.data;
    })
    .finally(function() {
        $scope.loading = false;
        $("#tournament-table").removeClass("hidden");
    });

    $scope.getDeleteURL = function(tournamentId) {
        return '/tournaments/delete/' + tournamentId;
    }

    $scope.getEditURL = function(tournamentId) {
        return '/tournaments/edit/' + tournamentId;
    }

    $scope.expandTable = function($event) {
        if ($($event.currentTarget).children().hasClass("fa-caret-right")) {
            $($event.currentTarget).children().removeClass("fa-caret-right");
            $($event.currentTarget).children().addClass("fa-caret-down");
    
            $($event.currentTarget).parent().next().removeClass("hidden");
        }
    
        else {
            $($event.currentTarget).children().removeClass("fa-caret-down");
            $($event.currentTarget).children().addClass("fa-caret-right");
    
            var $this = $($event.currentTarget);
            setTimeout(function(){$this.parent().next().addClass("hidden");}, 160);
        }
    
        $($event.currentTarget).parent().next().children().children().collapse("toggle");
    }
});