/*
	
	Need a huge optimization!!!
	
	
*/
$('documet').ready(function(){

	//Hide the cover text input
	$('#galleries_cover').hide();
	
	var cover_id = 	$('#galleries_cover').val();
	
	//If we have the id this is an edit
	if( cover_id != "" )
	{
		//Get the selected folder
		var folder_id = $('select[name=galleries_folder]').val();
		
		//Get the last div in the general tab
		var last_input = $('#general li div').last();
		
		//Set the img path
		var ajax_loader = SITE_URL+'addons/shared_addons/modules/galleries/img/ajax-loader.gif'
		
		//Show image loader
		last_input.append("<img id='ajax_loader_img' src='"+ajax_loader+"'>");
		
		//Ajax call
		$.ajax({
			type: 'POST',
			url : SITE_URL+'admin/galleries/create_cover',
			dataType : 'json',
			data:  {
				folder_id: 	folder_id,
				cover_id:	cover_id
			},
			success : function(data){
				
				if ( data.status === true )
				{						
					//append the new select for the image-pickup plugin
					last_input.append(data.msg);
										
				}
				else
				{
					last_input.append("<span style=\"color: red;\">"+data.msg+"<span>");
				}

				//Remove loader
				$('#ajax_loader_img').hide();				
				
				//Pickup the selection
				$("select.image-picker").imagepicker({
					clicked: function(){
						var sel = this.data('picker').selected_values();
						$('#galleries_cover').val(sel);
					}
				});										
			},
			error : function(XMLHttpRequest, textStatus, errorThrown) {
				alert(textStatus);
			}
		});
							

	}

	//Event when user choose a folder
	$('select[name=galleries_folder]').on('change', function() {
		
		var folder_id = $(this).val();
		
		//We do something only if the id is numeric		
		if( jQuery.isNumeric(folder_id) )
		{
			//Get the last div in the general tab
			var last_input = $('#general li div').last();
			
			//Set the img path
			var ajax_loader = SITE_URL+'addons/shared_addons/modules/galleries/img/ajax-loader.gif'
			
			//Show image loader
			last_input.append("<img id='ajax_loader_img' src='"+ajax_loader+"'>");
			
			//Ajax call
			$.ajax({
				type: 'POST',
				url : SITE_URL+'admin/galleries/create_cover',
				dataType : 'json',
				data:  {
					folder_id: 	folder_id,
				},
				success : function(data){
					
					if ( data.status === true )
					{						
						//append the new select for the image-pickup plugin
						last_input.append(data.msg);
						
					}
					else
					{
						last_input.append("<span style=\"color: red;\">"+data.msg+"<span>");
					}
					
					//Remove loader
					$('#ajax_loader_img').hide();
					
					//Pickup the selection
					$("select.image-picker").imagepicker({
						clicked: function(){
							var sel = this.data('picker').selected_values();
							$('#galleries_cover').val(sel);
						}
					});										
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
					alert(textStatus);
				}
			});
		}
		
	});
});