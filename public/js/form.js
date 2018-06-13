(function() {
 var app = angular.module('myApp', []);
    //alert(price);
    
    app.controller('niceController', function($scope){

         $scope.total_units = function(units) {
                    $scope.unit_price = price;
                    $scope.total = Math.ceil(units * $scope.unit_price);
                }
        
         $('#currency_type').on('change',function(){
            var currency_type = $(this).val();
            if( currency_type == "Bitcoin")
            {
                //alert(price);
               $scope.units;
               $scope.unit_price = price;
              
             //$('#nextStep2').prop('disabled', true);

            }
            else if( currency_type == "Perfect Money")
            {
                //alert(price2);
                $scope.units ;
             $scope.unit_price = price2;
            }
            else if ( currency_type == "") {

                //alert("Select a currency type");
            }
       })
       
    
    });
})();
   
