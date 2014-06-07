jQuery(document).ready(function($){

    targetDiv = $('#diasMes');

    var dataObj = {
        action: 'seleccionar_mes',
        anho: 2014, 
        mes: 'Junio' 
    };
    targetDiv = $('#diasMes');

    
    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        data: dataObj,
        dataType: 'text',
        success: function(data) {
            targetDiv.html(data);	    
        }
    });





    function ajaxCall( key, value1, value2 ) {
	var targetDiv;
	
	if( key == "anho" ) {
	    var dataObj = {
                action: 'seleccionar_anho',
		anho: value1      
            };
	    targetDiv = $('#dropdownMeses');
	}
        if( key == "mes" ) {
            var dataObj = {
                action: 'seleccionar_mes',
                anho: value1, 
                mes: value2 
            };
            targetDiv = $('#diasMes');
        }

	$.ajax({
	    url: 'ajax.php',
	    type: 'POST',
	    data: dataObj,
	    dataType: 'text',
	    success: function(data) {
		console.log("got data: ", data);
		targetDiv.html(data);
		prepararDropdowns();
	    }
	});
    }

    function execDD(li,text, key, val1, val2){
        console.log(li,text, key, val1, val2);
        li.parent().prev().find('.dropdown-text').text(text);
        ajaxCall( key, val1, val2 );
    }
    
    function prepararDropdowns() {
        $('#anhos_dropdown li').unbind('click');
	$('#anhos_dropdown li').click(function(){
	    var li = $(this);
	    var anho = li.text();	    
	    execDD(li,anho,'anho', anho, "");
        });

	$('#meses_dropdown li').unbind('click');
	$('#meses_dropdown li').click(function(){
            var li = $(this);
            var mes = li.text();
	    var anho = $('#anhos_dropdown').prev().text();
            execDD(li,mes,'mes',anho,mes);
	});
    }

    prepararDropdowns();
    

    
    
});
