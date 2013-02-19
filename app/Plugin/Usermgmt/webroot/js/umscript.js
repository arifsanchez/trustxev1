$(function(){
	$('[placeholder]').focus(function() {
	  var input = $(this);
	  if (input.val() == input.attr('placeholder')) {
		input.val('');
	  }
	}).blur(function() {
	  var input = $(this);
	  if (input.val() == '' || input.val() == input.attr('placeholder')) {
		input.val(input.attr('placeholder'));
	  }
	}).blur();
	$('[placeholder]').parents('form').submit(function() {
	  $(this).find('[placeholder]').each(function() {
		var input = $(this);
		if (input.val() == input.attr('placeholder')) {
		  input.val('');
		}
	  })
	});
	$('#UserToEmail').keyup(function(e){
			var code = (e.keyCode ? e.keyCode : e.which);
			if(code != 13 && code != 40 && code != 38) {
				var val=$(this).val();
				var pos = val.lastIndexOf(',');
				if(pos >0) {
					val = val.substring(pos+1,val.length);
				}
				val = $.trim(val);
				url = urlForJs+'searchEmails';
				data  = 'q='+val;
				if(val.length >1) {
					$.ajax({
						type: "POST",
						url: url,
						datatype: 'json',
						data: data,
						success: function(data, textStatus, jqXHR) {
							try {
								var data    = JSON.parse(data); // parse JSON to object
								var suggData="<ul class='um-autocomplete'>";
								var found = 0;
								$.each(data, function(key, value) {
									suggData +="<li id='"+key+"'><a href='javascript:void(0)'>"+value+"</a></li>";
									found++;
								});
								suggData +="</ul>";
								if(found) {
									$("#toEmailSuggession").html(suggData);
									$("#toEmailSuggession").show();
								} else {
									$("#toEmailSuggession").html('');
									$("#toEmailSuggession").hide();
								}
							} catch(e) {
							}
						}
					});
				} else if(val.length ==0) {
					$("#toEmailSuggession").html('');
					$("#toEmailSuggession").hide();
				}
			} else if (code == 13) {
				var sel = $("#toEmailSuggession .um-autocomplete li.selected");
				var id = sel.attr('id');
				if(id !=undefined) {
					id = id + ', ';
					var crntVal = $('#UserToEmail').val();
					var pos = crntVal.lastIndexOf(',');
					if(pos >0) {
						crntVal = crntVal.substring(0,pos+1)+id;
					} else {
						crntVal = id;
					}
					$('#UserToEmail').val(crntVal);
					$("#toEmailSuggession").html('');
					$('#UserToEmail').focus();
				}
			} else if (code == 40) {
				if($("#toEmailSuggession .um-autocomplete li").hasClass('selected')) {
					$("#toEmailSuggession .um-autocomplete li.selected").removeClass("selected").next().addClass("selected");
				} else {
					$("#toEmailSuggession .um-autocomplete li:first").addClass('selected');
				}
			} else if (code == 38) {
				if($("#toEmailSuggession .um-autocomplete li").hasClass('selected')) {
					$("#toEmailSuggession .um-autocomplete li.selected").removeClass("selected").prev().addClass("selected");
				} else {
					$("#toEmailSuggession .um-autocomplete li:last").addClass('selected');
				}
			} else {
				$("#toEmailSuggession").html('');
				$("#toEmailSuggession").hide();
			}
		});
		$('#UserToEmail').keypress(function(e){
			if(e.which == 13) {
				return false;
			}
		});
		$("#UserToEmail").live('blur', function(){
			$("#toEmailSuggession").slideUp(100);
		});
		$("#toEmailSuggession .um-autocomplete li a").live('click', function() {
			var parentContact = $(this).closest('li');
			var id = parentContact.attr('id')+', ';
			var crntVal = $('#UserToEmail').val();
			var pos = crntVal.lastIndexOf(',');
			if(pos >0) {
				crntVal = crntVal.substring(0,pos+1)+id;
			} else {
				crntVal = id;
			}
			$('#UserToEmail').val(crntVal);
			$('#UserToEmail').focus();
			$("#toEmailSuggession").html('');
		});
		$("#toEmailSuggession .um-autocomplete li").live('hover', function() {
			var parentUl = $(this).closest('ul');
			$(parentUl).find('li').removeClass('selected');
			$(this).addClass('selected');
		});
});