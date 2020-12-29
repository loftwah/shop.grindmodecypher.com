function wcccf_init_product_select2()
{
	/* if(jQuery(selector).length < 1)
		return; */
	
	jQuery(".js-data-product-ajax").each(function(index, elem)
	{
		/*var already_setted_var = jQuery(elem).data('init-value');
		var values = already_setted_var ? already_setted_var.split(",") : "";
		*/
		jQuery(elem).select2(
		{
		  width: 300,
		  //placeholder: wcccf.select2_selected_value == "" ? wcccf.select2_placeholder : wcccf.selected_user_info_label+wcccf.select2_selected_value,
		  ajax: {
			url: ajaxurl,
			dataType: 'json',
			delay: 250,
			tags: "true",
			multiple: true,
			/*initSelection: function (element, callback) {
				callback(jQuery.map(element.data('init-value').split(','), function (id) {
					return { id: id, text: id };
				}));
			},*/
			data: function (params) {
			  return {
				search_string: params.term, // search term
				page: params.page || 1,
				action: 'wcccf_get_product_list'
			  };
			},
			processResults: function (data, params) 
			{
			  //console.log(params);
			 
			   return {
				results: jQuery.map(data.results, function(obj) 
				{
					return { id: obj.id, text: "<strong>(SKU: "+obj.product_sku+" ID: "+obj.id+")</strong> "+obj.product_name };
				}),
				pagination: {
							  'more': typeof data.pagination === 'undefined' ? false : data.pagination.more
							}
				};
			},
			cache: true
		  },
		  escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
		  minimumInputLength: 0,
		  templateResult: wcccf_formatRepo, 
		  templateSelection: wcccf_formatRepoSelection  
		});
	
	});
	//init
	//if(wcccf.select2_selected_value != "")
	{
		//console.log("here: "+wcccf.select2_selected_value);
		//jQuery("#wcccf_select2_customer_id").select2('val',wcccf.select2_selected_value).trigger("change");
	}
	
}
function wcccf_formatRepo (repo) 
{
	if (repo.loading) return repo.text;
	
	var markup = '<div class="clearfix">' +
			'<div class="col-sm-12">' + repo.text + '</div>';
    markup += '</div>'; 
	
    return markup;
}

function wcccf_formatRepoSelection (repo) 
{
  return repo.full_name || repo.text;
}