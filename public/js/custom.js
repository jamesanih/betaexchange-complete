$(document).ready(function()
	{
		 $('.numericText').keypress(function (event) {
            return isNumber(event, this)
        });

        function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }    
	});



        $(function () {
    $('#units').keyup(function () {
    var price= parseFloat($("#unit_price").val()) || 0;
    var units=  parseFloat($("#units").val()) || 0;
    var total=  (price * units);
    var total=  Math.ceil(total);
    $("#total_units").val(total);
    });


              $('#bitcoin').DataTable({
                            "paging": true,
                            "lengthChange": true,
                            "searching": true,
                            "ordering": true,
                            "responsive":true,
                            "info": true,
                            "autoWidth": true,
                            "order": [[0, "desc"]],
                            dom: 'Bfltip',
                            buttons: [
                                'copy', 'csv', 'excel', 'pdf', 'print'
                            ]
                        });
        });


       
$(function () {
    $('#units').keyup(function () {
      var price= parseFloat($("#unit_price").val()) || 0;
      var units=  parseFloat($("#units").val()) || 0;
      var total=  (price * units);
      var total=  Math.ceil(total);
      $("#total_units").val(total);
    });


              $('#perfect').DataTable({
                            "paging": true,
                            "lengthChange": true,
                            "searching": true,
                            "ordering": true,
                            "responsive":true,
                            "info": true,
                            "autoWidth": true,
                            "order": [[0, "desc"]],
                            dom: 'Bfltip',
                            buttons: [
                                'copy', 'csv', 'excel', 'pdf', 'print'
                            ]
                        });
        });