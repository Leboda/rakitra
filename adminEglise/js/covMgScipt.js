$(document).ready(function(){
	$('.date-cin').bootstrapMaterialDatePicker({
        clearButton: true,
        time: false,
    
    });

    $('.date-naissance').bootstrapMaterialDatePicker({
        clearButton: true,
        time: false,
    
    });

    $('#datePermisC').bootstrapMaterialDatePicker({
        clearButton: true,
        time: false,
    
    });

    $('#dateCinP').bootstrapMaterialDatePicker({
        clearButton: true,
        time: false,
    
    });

    $('#datePermisC').bootstrapMaterialDatePicker({
        clearButton: true,
        time: false,
    
    });


    

    $('.date_debut').bootstrapMaterialDatePicker({ clearButton: true,time:false});
    $('.date_fin').bootstrapMaterialDatePicker({ clearButton: true,time:false }).on('change', function(e, date)
    {
        $('.date_debut').bootstrapMaterialDatePicker('setMinDate', date);
        $('.date_debut').bootstrapMaterialDatePicker('setMaxDate',moment(date).add(30, 'day').format());
    });



    $( "#num_cin" ).keyup(function() {
    	var error = "";
	  	if(this.value.length > 12) {
	      this.value=[];
	      
	  	}
	});
	$('.btn-add-code-circulation').click(function(){
		var num_cin     = $( "#num_cin").val();
		var num_cin_nbr = num_cin.length;
		if (num_cin != "" && num_cin_nbr < 12) {
			$('.message').html('<p style="color: red;">Erreur de contenu du N° CIN. Ceci doit contenir 12 nombres, pas plus, pas moins.</p>');
			$('.message').show('slow');
			setTimeout("$('.message').hide()",4500);	
			return false;
		}
	});

	$('.add-personne-form-line').on('click',function(){
		var HTML = '';
		HTML     += '<div class="row clearfix personne-row-field">';
			HTML += '<div class="col-md-3"><div class="input-group"><span class="input-group-addon"><i class="material-icons">personn</i></span><div class="form-line"><input type="text" name="nom[]" value="" id="nom" class="form-control" placeholder="Nom" required=""></div></div></div>';
			HTML += '<div class="col-md-3"><div class="input-group"><div class="form-line"><input type="text" name="prenom[]" value="" id="prenom" class="form-control" placeholder="Prénom(s)" required=""></div></div></div>';
			HTML += '<div class="col-md-3"><div class="input-group"><div class="form-line"><input type="text" name="num_cin[]" value="" id="num_cin" class="form-control" placeholder="N° CIN" required=""></div></div></div>';
			HTML += '<div class="col-md-2"><div class="input-group"><div class="form-line"><input type="text" name="adresse[]" value="" id="adresse" class="form-control" placeholder="Adresse" required=""></div></div></div>';
			HTML += '<div class="col-md-1"><div class="input-group"><div class="form-line" style="border-bottom:none !important;"><a href="#" onclick="delete_line(this);return false;" title="Supprimer" class="btn bg-red btn-circle waves-effect waves-circle waves-float"><i class="material-icons">delete</i></a></div></div></div>';
		HTML     += '</div>';
		if (!$('.personne-row-field').is(':visible')) {
			$('.personne-row-field').show();
		}
		else{
			$('.other-personne-row-field').append(HTML);
		}

		return false;
	});


	$('.list-demande-personne').DataTable({
		responsive: true
	});

    
});

function delete_line(link){
	if ($('.personne-row-field').length == 1) {
		$(link).parents('.form-line').parents('.input-group').parents('.col-md-1').parents('.personne-row-field').hide();
	}
	else{
		$(link).parents('.form-line').parents('.input-group').parents('.col-md-1').parents('.personne-row-field').remove();
	}
}

function detail_demande(line, id){
	var HTML = "";
	$('.tbody-table-personne-affecter').empty();
	$.ajax({
		type : 'POST',
		url  : 'detail-demande',
		data : {id : id},
		datatype : 'json',
		success : function(data){
	       	var response         = JSON.parse(data);
			var demande          = response.demande;
			var personneAffecter = response.personneAffecter;
			$.each(demande, function(i, field){
	            $('.small-title').text(field.motif);
	            $('.motif-demande').text(field.motif);
	            $('.date_debut').text(field.date_debut);
	            $('.date_fin').text(field.date_fin);
	        });
	        $.each(personneAffecter, function(i, field){
	        	
	        	HTML += "<tr>";
	        		HTML += "<td>"+field.prenom+" "+field.nom+"</td>";
	        		HTML += "<td>"+field.num_cin+"</td>";
	        		HTML += "<td>"+field.adresse+"</td>";
	        	HTML += "</tr>";
	        });
	        $('.tbody-table-personne-affecter').append(HTML);
			$('#modalDetailDemande').modal();
		}
	});
}
function imprimer_demande(line, id){
	$.ajax({
		type : 'POST',
		url  : 'imprimer-demande',
		data : {id : id},
		datatype : 'json',
		success : function(data){
			console.log(data);
		}
	});
}