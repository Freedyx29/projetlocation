// autocompletion
function autocompletTypeBien() {
	var min_length = 1; // nombre de caractère avant lancement recherche 
	var keyword = $('#nom_lib_typebien').val();
        
   
    
    // nom_id fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'refreshtypebien.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#nom_list_id_typebien').show();
				$('#nom_list_id_typebien').html(data);
			}
		});
	} else {
		$('#nom_list_id_typebien').hide();
	}
}

// Lors du choix dans la liste
function set_item2(item,item2) {
	// change input value
	$('#nom_lib_typebien').val(item);
        $('#id_type_bien').val(item2);
	// hide proposition list
	$('#nom_list_id_typebien').hide();
}