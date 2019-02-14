window.onload = function() {
	//Set Textarea height to fit its label
	$("textarea").height($(this).siblings("label").height()+50);
	//If any field is filled, put margin for ir
	//$(".form-group.focused").prop("style","margin-top: "+($(this).find("label:not(.form-check-label):not(.no-effect-label)").height()+20)+"px !important;");
	//Clear any form inside a modal
	$(".modal").each(function() {
		$(this).find('input:not([type=submit]):not([type=hidden]), select, textarea').val('')
								.find('input:radio, input:checkbox').prop('checked', false);
	});
	//Clear form inside a modal when modal is dissmissed
	$(".modal").on("hide.bs.modal",function() {
		$(this).find('input:not([type=submit]):not([type=hidden]), select, textarea').val('').trigger("blur")
								.find('input:radio, input:checkbox').prop('checked', false);
	});
	/*$("input:not([type=checkbox]):not([type=submit]):not([type=hidden]), textarea").val("");
	$("input[type=checkbox]").prop("checked",false);*/
	$("input[type=date]").filter(function() { return !this.value; }).addClass("hide-value");
	
	$("input:not([type=checkbox]):not([type=radio]):not([type=submit]):not([type=file]), textarea").focus(function(){
		var label = $(this).siblings("label:not(.form-check-label):not(.no-effect-label)");
	  $(this).parents('.form-group').addClass('focused');
		  //.prop("style","margin-top: "+(label.height()+20)+"px !important;");
		
	});
	$("label:not(.form-check-label):not(.no-effect-label)").click(function(){
	  $(this).parents('.form-group').addClass('focused');
		  //.prop("style","margin-top: "+($(this).height()+20)+"px !important;");
		$(this).siblings("input").focus();
	});
	
	$("label.form-check-label").click(function(){
		var checkBoxes = $(this).siblings("input[type=radio]");
		checkBoxes.prop("checked", !checkBoxes.prop("checked"));
		checkBoxes.trigger('change');
	});
	
	$("input:not([type=checkbox]):not([type=radio]):not([type=submit]):not([type=file]), textarea").blur(function(){
	  var inputValue = $(this).val();
		//If Invalid input
	  if ($(this).is(":invalid") &&  inputValue !== "" ) {
		  $(this).addClass('invalid');
	  } else if ( inputValue === "" ) { //If Empty
		$(this).removeClass('filled invalid');
		$(this).parents('.form-group').removeClass('focused');
			//.prop("style","");		  
	  } else {
		$(this).addClass('filled');
		  $(this).removeClass('invalid');
	  }
	});
	
	//Date input style
	$("input[type=date]").focus(function() {
		$(this).removeClass("hide-value");
	});
	$("input[type=date]").blur(function() {
		var inputValue = $(this).val();
		
		//If Invalid input
		if ($(this).is(":invalid") &&  inputValue !== "" ) {
		  $(this).addClass('invalid');
		} else if ( inputValue === "" ) { //If Empty
			$(this).removeClass('filled invalid').addClass('hide-value');
			$(this).parents('.form-group').removeClass('focused');
		} else {
			$(this).addClass('filled');
			$(this).removeClass('invalid hide-value');
		}
	});
	
};


/*
//Code for file input
//From: https://codepen.io/claviska/pen/vAgmd
$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});*/