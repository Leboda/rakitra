$(document).ready(function(){

	$('.list-demande-personne').DataTable({
		responsive: true
	});

	$('.list-eglise').DataTable({
		responsive: true
	});

	$('.list-transaction').DataTable({
		responsive: true
	});

	$('.list-versement').DataTable({
		responsive: true
	});

	setInterval(screnUpdate, 24000); 

	
 
	$('.btn-add-versement').click(function(){
		if ($('.amountInit').val() == 0) {
			$('.message_versement').html('<p style="color:red;">Desolé, le solde de cette esglise est vide <p>');
			return false;
		}
		else{
			if($("input[name='choix_versement']:checked").val() == "partial"){
				if ($('.amount_partial').val() == "") {
					$('.message_versement').html('<p style="color:red;">Veuillez saisir le montant à verser<p>');
					return false;
				}
				else if ($('.amount_partial').val() > $('.amountInit').val()) {
					$('.message_versement').html('<p style="color:red;">Le montant doit être inferieur ou égal à ' + $('.amountInit').val()+'<p>');
					return false;
				}
				else{
					return true;
				}
			}
			else{
				return true;
			}
		}
	});

	$('.update-form-api').each(function(){
		if ($('.authorisation_user').val() == "") {
			$('#modalAsqAuthorization').modal();
		}
	});

	$('.btn-verif-code').click(function(){
		var code = $('.code_super_admin').val();
		$.ajax({
			type : 'POST',
			url  : 'verif-code',
			data : {code : code},
			datatype : 'json',
			success : function(data){
				if (data == "OK") {
					$('.form-control').each(function(){
						$(this).removeAttr('disabled');
					});
					$('.btn-update-api').show();
					$('.btn-close-modal').click();
				}
				else{
					$('.message-admin-verif').html('<p style="color:red;">Desolé, code erreur</p>');
					
				}
			}
		});
		return false;
	});
    
});


function verser(link,idEglise){
	$('.small-description-title').text('Versmement à l\'eglise '+$(link).parents('td').parents('.eglise-line').find('.eglise-name').text());
	$('.idEglise').val(idEglise);
	$('.amountInit').val($(link).parents('td').parents('.eglise-line').find('.amount_init').text());
	$('.max_amount').text('(Max : Ar ' + $(link).parents('td').parents('.eglise-line').find('.amount_init').text()+')');
	$('#modalVersement').modal();
}

$(document).on('change', 'input[type=radio][name=choix_versement]', function (event) {
    if($(this).val() == "partial") {
    	$('.imput-partial-amount').show();
    	$('.title_amount_partial').show();
    } 
    else{
    	$('.imput-partial-amount').hide();
    	$('.title_amount_partial').hide();
    }    
});



function openScreenEglise(idEglise){
	console.log($('.base_url').val()+"screen-eglise");
  	var myWindow = window.open($('.base_url').val()+"screen-eglise", "MsgWindow", "width=250,height=300");
 // myWindow.document.write("<p>This is 'MsgWindow'. I am 200px wide and 100px tall!</p>");
}


function screnUpdate() { 
	var HTML = "";
	$.ajax({
		type : 'GET',
		url  : $('.base_url').val()+'get-action-filde',
		datatype : 'json',
		success : function(data){
			var response             = JSON.parse(data);
			var amount_total          = response.amount_total;
			var transactionInfo       = response.transactionInfo;
			$('.amount_total').text(amount_total);
	        $.each(transactionInfo, function(i, field){
				HTML += '<div class="alert alert-success">';
	            	HTML += '<strong>'+field.nom+'!</strong> a fait un offrande de '+field.montant+' Ar.'
	            HTML += '</div>';
	        });
			
            $('.notification').html(HTML);
            $('.notification').show('slow');
            setTimeout("$('.notification').hide('slow')",9000);  
		}
	});
	return false;
}

