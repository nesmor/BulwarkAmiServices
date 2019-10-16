function getBaseUrl(){
	if($(location).attr('href').includes("BulwarkCallCenter")){
		return location.protocol + "//" + location.host + ':' + location.port + '/BulwarkCallCenter'
	}else {
		return '';
	}
}

$(".box-tools").append("<a class=\"btn btn-primary btn-sm\" href=" + getBaseUrl() + "\"/dashboard\">Back</a>");
$('.a-delete').click(function(event) {
	 event.preventDefault();
	 $('#delete-modal').on('show.bs.modal', function (e) {
		 $(".btn-custom-delete").click(function(){
			 $(location).attr('href',$(event.currentTarget).attr("href"));
		 });
	 });
	 $('#delete-modal').modal();
});


if($(location).attr('href').includes("/script/edit")){
	urlData = $(location).attr('pathname').split('/'); 
	console.log(urlData[urlData.length - 1]);
	getDialogs(urlData[urlData.length - 1]);//Split id from url
}


function getDialogs(id){
	$.ajax({
        url: getBaseUrl() +  '/script/ajax_get_complete_script/' + id,
        type: 'GET',
        success: function(response) {
        	$('#script-dialogs').append(response);
        },
        error: function(x, e) {
        	console.log('Error processing scripts');
        }
	});
}

function addDialog(){
	$.ajax({
        url: getBaseUrl() + '/script/ajax_get_add_dialog_form',
        type: 'GET',
        success: function(response) {
       // 	$('#dialogs-panel').empty();
        	$('#dialogs-panel').append(response);
        },
        error: function(x, e) {
        	console.log('Error processing scripts');
        }
	});
}

function addOption(){
	$.ajax({
        url: getBaseUrl() +  '/script/ajax_get_add_option_form/' + $('.btn-add-new-option').attr('data-dialogId'),  //Dialog id to add option
        type: 'GET',
        success: function(response) {
        	$('#options-panel').append(response);
        },
        error: function(x, e) {
        	console.log('Error processing scripts');
        }
	});
}

/* 1. Cuenta los hijos
 * 
 */
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("id", ev.target.id);
  console.log(ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("id");
  $dialogs = $('#dialogs-panel').children();
/*  if($dialogs.last().find('select[name=type]').val() != 'INFORMATIVE' 
	      &&  $('#' + data).find('select[name^="type"]').val() != 'INFORMATIVE'
	    	  &&  $dialogs.last().attr('id') != data){
	  //TODO send error message
	  console.log($dialogs.last().find('select[name=type]').val());
	  alert('Last dialog type must be informative');
	  return false;
  }else{
	  
  }*/  //TODO ADD VALIDATION
  $($('#' + data)).insertBefore($(ev.target).closest('div[draggable^="true"]'));
}

function updatePosition(ev) {
	  ev.preventDefault();
	  var positions = "";
	  $dialogs = $('#dialogs-panel').children();
	  $dialogs.each(function (index){
		  positions += $(this).attr('id');
		  positions += "-"
	  });
	  console.log(positions);
	  $.ajax({
	        url: getBaseUrl() +  '/script/ajax_script_update_dialogs_position',
	        data:{'positions' : positions},
	        type: 'GET',
	        success: function(response) {
	        	console.log('successfully store dialog positions');
	        },
	        error: function(x, e) {
	        	console.log('Error processing scripts');
	        }
		});
	  //TODO update database position 
}


function showSuccessMessage(parent, message){
	
	$(parent).append('<div id="alert-message-wrap" style=" position: fixed; top: 0;  left: 40%; width: 30%;"'
			            +  'class="alert alert-success alert-dismissible" >'
			            +	'<strong>Success!</strong> ' + message 
            			+	'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
            			+	'<span aria-hidden="true">&times;</span>'
            			+	'</button>'
            			+	'</div>');
	
}

function showErrorMessage(parent, message){
	
	$(parent).append('<div id="alert-message-wrap" style=" position: fixed; top: 0;  left: 40%; width: 30%;"'
			            +  'class="alert alert-danger alert-dismissible" ">'
			            +	'<strong>Error!</strong>' + message 
						+	'<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
						+	'<span aria-hidden="true">&times;</span>'
						+	'</button>'
						+	'</div>');
	
}

//Delete dialog
$(document).on('click','[data-widget="remove"]', function (ev){
	 //ev.preventDefault();
	 dialogId = $(ev.currentTarget).data('id');
	 if(typeof(dialogId) != 'undefined'){
		 ev.stopImmediatePropagation();
		 
		 console.log(dialogId);
		// var status = false;
		 var modal = $('#modal-danger');
		 modal.find('.cust-delete').click(function(){
		 modal.find('.close').click(); //Close modal window
			 //Delete dialog
		 $.ajax({
			        url: getBaseUrl() + '/dialog/ajax_delete_complete_dialog/' + dialogId ,
			        dataType: "json",
			        type: 'GET',
			        success: function(response) {
			        	console.log(response);
			        	if(response.hasOwnProperty('error')){
			        		showErrorMessage('.content', response.error);
					    }else{
					    	showSuccessMessage('.content', response.message);
					    	window.location = $(location).attr('href');
					    //	$(ev.target).trigger(ev);
					    //	status = true;
						}
			        //	$('#alert-message').text("This is a message");
			        	$('.alert').alert();
			        	
			        },
			        error: function(x, e) {
			        	console.log('Error processing dialog form');
				        }
					});
		 });
		 modal.modal();
	 }
	 
});


//Show add option form to dialog
$(document).on('click','.btn-add-option', function (ev){
	 //ev.preventDefault();
	 ev.stopImmediatePropagation();
	 dialogId = $(ev.currentTarget).data('id');
	 console.log(dialogId);
	// var status = false;
	 var modal = $('#modal-option');
	 showOptionsByDialogId(dialogId);
	 modal.modal();
	// return status;
});

function showOptionsByDialogId(dialogId){
	 $('#options-panel').empty();
	 $.ajax({
		        url: getBaseUrl() +  '/option/ajax_get_by_dialog_id/' + dialogId ,
		        type: 'GET',
		        success: function(response) {
		        	
				    $('#options-panel').append(response);
				    $('.btn-add-new-option').attr('data-dialogid', dialogId);
		        },
		        error: function(x, e) {
		        	alert(e);
		        	console.log('Error processing dialog form');
			        }
	});
	
}

//Save option
$(document).on('submit','.script-option-form', function (ev){
	 ev.preventDefault();
	 var form = $(this);
	 $.ajax({
	        url: form.attr('action'),
	        data: form.serialize(),
	        dataType: "json",
	        type: 'POST',
	        success: function(response) {
	        	console.log(response);
	        	if(response.hasOwnProperty('error')){
		        	var error = '';
	        		nodes = $.parseHTML(response.error);
	        		showErrorMessage('.option-message', "  Error procesing form data, check values.");
			    }else{
			    	showSuccessMessage('.option-message', response.message);
			    	dialogId = form.find("input[name='dialogId']").val();
			    	showOptionsByDialogId(dialogId);
				}
	        //	$('#alert-message').text("This is a message");
	        	$('.alert').alert();
	        },
	        error: function(x, e) {
	        	console.log('Error processing dialog form');
		        }
			});
	}
);
// Edit dialog
$(document).on('submit','.script-dialog-form', function (ev){
	 ev.preventDefault();
	 $.ajax({
	        url: $(this).attr('action'),
	        data: $(this).serialize(),
	        dataType: "json",
	        type: 'POST',
	        success: function(response) {
	        	console.log(response);
	        	if(response.hasOwnProperty('error')){
	        		showErrorMessage('.content', "  Error procesing form data, check values.");
			    }else{
			    	showSuccessMessage('.content', response.message);
				}
	        //	$('#alert-message').text("This is a message");
	        	
	        	$('.alert').alert();
	        	
	        },
	        error: function(x, e) {
	        	console.log('Error processing dialog form');
		        }
			});
	}
);

//save dialogs
$(document).on('submit','.script-add-dialog-form', function (ev){
	 urlData = $(location).attr('pathname').split('/'); 
	 console.log(urlData[urlData.length - 1]);
	 ev.preventDefault();
	 $('input[name^="scriptId"]').val(urlData[urlData.length - 1]);
	 $.ajax({
	        url: $(this).attr('action'),
	        data: $(this).serialize(),
	        dataType: "json",
	        type: 'POST',
	        success: function(response) {
	        	console.log(response);
	        	if(response.hasOwnProperty('error')){
	        		showErrorMessage(response.error);
			    }else{
			    	showSuccessMessage(response.message);
			    	window.location = $(location).attr('href');
				}
	        //	$('#alert-message').text("This is a message");
	        //  $('.alert').alert();
	        },
	        error: function(x, e) {
	        	console.log('Error processing dialog form');
		        }
			});
	}
);


function changeAddOptionStatus(id){
	$('select[name="type"]').change(function(ev){
		 var $option = $(this).find('option:selected');
		 if($option.val() == 'CLOSED'){
			 $('.btn-box-tool[data-id=' + id + ']').prop("disabled", false);
		 }else{
			 $('.btn-box-tool[data-id=' + id + ']').prop("disabled", true);
		 }
	});
}

function removeOption(ev){
	 //ev.preventDefault();
	 optionId = $(ev.currentTarget).data('id');
	 dialogId = $(ev.currentTarget).data('dialogid');
	 if(typeof(optionId) != 'undefined'){
		 ev.stopImmediatePropagation();
		 console.log(optionId);
		 $.ajax({
			        url: getBaseUrl() + '/option/ajax_delete_by_id/' + optionId ,
			        dataType: "json",
			        type: 'GET',
			        success: function(response) {
			        	console.log(response);
			        	if(response.hasOwnProperty('error')){
			        		showErrorMessage('.option-message', "Problem removing option from dialog");
					    }else{
					    	showSuccessMessage('.option-message', response.message);
					    	showOptionsByDialogId(dialogId);
						}
			        	$('.alert').alert();
			        	
			        },
			        error: function(x, e) {
			        	console.log('Error processing dialog form');
				   }
		});
	 }
}

/*
$('#sel-script').empty().append('<option value="">Select Script</option>');        
$.ajax({
        url: '/script/ajax_get_script',
        dataType: 'json',
        type: 'GET',
        success: function(response) {
            $.each(response,function(key,script){
            	$("#sel-script").append('<option value="' + script.id +'">' + script.title + '</option>');
            })                         
        },
        error: function(x, e) {
        	console.log('Error processing scripts');
        }
});

$('#sel-script').change(function(event) {
	
})
*/

