$(document).ready(function(){


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
function detail_demande_admin(line, id, type){
	var HTML = "";
	var HTMLC = "";
	var HTMLV = "";
	$('.tbody-table-personne-affecter').empty();
	$.ajax({
		type : 'POST',
		url  : 'admin-detail-demande',
		data : {id : id, type : type},
		datatype : 'json',
		success : function(data){
			console.log(data);
	       	var response         = JSON.parse(data);
			var demande          = response.demande;
			
			$.each(demande, function(i, field){
	            
	            $('.motif-demande').text(field.motif);
	            $('.date_debut').text(field.date_debut);
	            $('.date_fin').text(field.date_fin);
	            $('.destination-demande').text(field.desitnation);
	            $('.district-demande').text(field.district);
	            if (type == "1") {
	            	$('.small-title').text("Pour véhicule");
	            }
	            else{
	            	$('.small-title').text("Type particulier");
	            }
	        });

	        if (type == "1") {
	        	$('.table-personne-affecter').hide();
	        	$('.title-personne-affecter').hide();
	        	

	        	$('.title-vehicule-affecter').show();
	        	$('.table-vehicule-affecter').show();
	        	$('.title-chaufeur-affecter').show();
	        	$('.table-chauffeur-affecter').show();

	        	var vehiculeAffecter = response.vehiculeAffecter;
	        	var chaufeurAffecter = response.chauffeurAffecter;

	        	$.each(vehiculeAffecter, function(i, field){
		        	
		        	HTMLV += "<tr>";
		        		HTMLV += "<td>"+field.immatriculation+"</td>";
		        		HTMLV += "<td>"+field.type+"</td>";
		        		HTMLV += "<td>"+field.nb_place+"</td>";
		        		HTMLV += "<td>"+field.nom_proprietaire+"</td>";
		        		HTMLV += "<td>"+field.tel_proprietaire+"</td>";
		        		HTMLV += "<td>"+field.adresse+"</td>";
		        	HTMLV += "</tr>";
		        });

		        $.each(chaufeurAffecter, function(i, field){
		        	
		        	HTMLC += "<tr>";
		        		HTMLC += "<td>"+field.nom+"</td>";
		        		HTMLC += "<td>"+field.tel+"</td>";
		        		HTMLC += "<td>"+field.permis+"</td>";
		        		HTMLC += "<td>"+field.date_permis+"</td>";
		        	HTMLC += "</tr>";
		        });

		        


	        }
	        else{
	        	$('.title-vehicule-affecter').hide();
	        	$('.table-vehicule-affecter').hide();
	        	$('.title-chaufeur-affecter').hide();
	        	$('.table-chauffeur-affecter').hide();

	        	$('.table-personne-affecter').show();
	        	$('.title-personne-affecter').show();
	        	

	        	var personneAffecter = response.personneAffecter;
	        	$.each(personneAffecter, function(i, field){
		        	
		        	HTML += "<tr>";
		        		HTML += "<td>"+field.prenom+" "+field.nom+"</td>";
		        		HTML += "<td>"+field.num_cin+"</td>";
		        		HTML += "<td>"+field.adresse+"</td>";
		        	HTML += "</tr>";
		        });
	        }
	        console.log(HTMLC);
	        $('.tbody-table-vehicule-affecter').html(HTMLV);
	        $('.tbody-table-chauffeur-affecter').html(HTMLC);
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

function valider_demande(line, id){
	$.ajax({
        url : "valider-demande",
        type : 'POST',       
        data : {id : id},   
        success : function(data){
           	$(line).parents('.action').parents('.lineDemande').find('.status-document').html('<span style="color:#4CAF50 !important">Valider</span>');
           	$('.message').html("<p style='text-align:center;color:blue;'>Le processus de validation que vous venez de faire est un succés.</p>");
			$('.message').show('slow');
			setTimeout("$('.message').hide('slow')",4500);
        }
    });
}


function refuser_demande(line, id){
	$('<div><h4>Êtes-vous sur de vouloir refuser cette demande ?</h4></div>').dialog({
        title: 'Detalhes do produto',
        modal: true,
        resizable: false,
        width: 500,
        maxHeight: 400,
        closeText: 'fechar',
        draggable: true,
        show: 'fade',
        hide: 'fade',
        dialogClass: 'main-dialog-class',

        title: "Réfus de la demande",
        buttons: [

            {  
                text: "Oui",    

                click: function () {

                    $.ajax({
			            url : "refuser-demande",
			            type : 'POST',       
			            data : {id : id},   
			            success : function(data){
			               	$(line).parents('.action').parents('.lineDemande').find('.status-document').html('<span style="color:red !important">Refuser</span>');
			               	$('.message').html("<p style='text-align:center;color:red;'>Le processus de refus que vous venez de faire est un succés.</p>");
							$('.message').show('slow');
							setTimeout("$('.message').hide('slow')",4500);
			            }
			        });
					$(this).dialog("close");

                }

            },

            {

                text: "Non",

                click: function () {

                    $(this).dialog("close");

                }

            }

        ]

    });
}
function supprimer_demande(line, id){
	$('<div><h4>Êtes-vous sur de vouloir supprimer cette demande ?</h4></div>').dialog({
        title: 'Detalhes do produto',
        modal: true,
        resizable: false,
        width: 500,
        maxHeight: 400,
        closeText: 'fechar',
        draggable: true,
        show: 'fade',
        hide: 'fade',
        dialogClass: 'main-dialog-class',

        title: "Suppression demande",
        buttons: [

            {  
                text: "Oui",    

                click: function () {

                    $.ajax({
			            url : "supprimer-demande",
			            type : 'POST',       
			            data : {id : id},   
			            success : function(data){
			               	$(line).parents('.action').parents('.lineDemande').remove();
			               	$('.message').html("<p style='text-align:center;color:red;'>Le processus de suppression que vous venez de faire est un succés.</p>");
							$('.message').show('slow');
							setTimeout("$('.message').hide('slow')",4500);
			            }
			        });

					$(this).dialog("close");

                }

            },

            {

                text: "Non",

                click: function () {

                    $(this).dialog("close");

                }

            }

        ]

    });
}