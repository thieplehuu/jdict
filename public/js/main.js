function removeMeanField(e) {	
	e.closest( ".row" ).remove();
}
function clearSearchText(){
	$(".search_input").val('');
}
$(document).ready(function() {
	
    $("#btn-add-mean-field").click(function(e){ //on add input button click
    	var wrapper         = $("#add-meain-fields-wrap"); //Fields wrapper
    	var count = wrapper.children().length;
    	var last = wrapper.find(".row").last();

    	var last_id = last.attr('id');
    	last_id++;
    	/*
    	var clone = wrapper.find('.row').first().clone();
    	clone.find( "#input-mean" ).attr('name', 'meaning['+count+'][mean]');
    	clone.find( "#input-example" ).attr('name', 'meaning['+count+'][examples]');
    	*/
    	var html = '<div class="row" id ="'+ last_id +'">'
    		+'<div class="panel-custom col-md-10" style = "border-top: none">'
			    	+'<div class="form-group ">'
					+'<label for="meaning" class="col-md-4 control-label">Meaning</label>'
					    +'<div class="col-md-8">'
					    +'<textarea class="form-control" name="meaning['+last_id+'][mean]" type="text" cols="30" rows="5"></textarea>'
					        
					        +'</div>'
					    +'</div>'		
					+'<div class="form-group ">'
					+'<label for="meaning" class="col-md-4 control-label">Examples</label>'
					    +'<div class="col-md-8">'
					    +'<textarea class="form-control" name="meaning['+last_id+'][examples]" type="text"  cols="30" rows="5"></textarea>'
					        
					        +'</div>'
					    +'</div>'
					+'</div>'
				+'<div class="col-md-2">'
				+'<button id="btn-remove-mean-field" class="btn btn-primary" type="button" onclick="removeMeanField(this)">Remove</button>'
			    +'</div>';
			+'</div>';
		
        e.preventDefault();
        
        $(wrapper).append(html);

    });
});

$(function(){
	
	
	jQuery.fn.addHidden = function (name, value) {
	    return this.each(function () {
	        var input = $("<input>").attr("type", "hidden").attr("name", name).val(value);
	        $(this).append($(input));
	    });
	};
	
	
	$(".select2-multiple").select2();
	/*
	$('.select2-ajax').typeahead({
	    source: function (typeahead, query) {
	        return $.get('home/autocomplete', { term: query }, function (data) {
	            return typeahead.process(data);
	        });
	    }
	});
	*/
	
	var term = $('#autocomplete-ajax').val();
	$('.select2-ajax').typeahead({
        ajax: 'home/autocomplete?' + term,
        onSelect: function (data) {
        	$("form").addHidden('search_unique', data.value)
            .submit();
        },

    });
	$(".fake-autofill-fields").show();
    // some DOM manipulation/ajax here
    window.setTimeout(function () {
        $(".fake-autofill-fields").hide();
    },1);
});