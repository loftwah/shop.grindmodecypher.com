jQuery(document).ready(function()
{
	/*console.log(wcccf_datetime.time_format);
	console.log(wcccf_datetime.date_format);*/
	wcccf_init_time_picker();
	wcccf_init_date_picker();
	
	jQuery(document).on('change', '.wcccf_max_datetime_type_selector', wcccf_manage_max_datetime_selectors_visibility)
	jQuery(document).on('change', '.wcccf_min_datetime_type_selector', wcccf_manage_min_datetime_selectors_visibility)
});
function wcccf_init_time_picker()
{
	jQuery('.wcccf_min_time_value, .wcccf_max_time_value').pickatime({
	  format: 'HH:i',//wcccf_datetime.time_format
	  formatSubmit: 'HH:i'
	  /* min: [7,30],
		 max: [14,0]
		*/
	});
}
function wcccf_init_date_picker()
{
	jQuery('.wcccf_min_date_value, .wcccf_max_date_value').pickadate({
	  format: 'yyyy-mm-dd', /*//wcccf_datetime.date_format*/
	  formatSubmit: 'yyyy-mm-dd',
	  selectYears: 300,
	  selectMonths: true,
	  /* min: new Date(2015,3,20),
		max: new Date(2015,7,14)
		*/
	});
}
function wcccf_manage_max_datetime_selectors_visibility(event)
{
	var id = jQuery(event.target).data('id');
	jQuery('.wcccf_datetime_max_value_selector_'+id).each(function(index, elem)
	{
		if(jQuery(this).hasClass('wcccf_hide'))
		{
			jQuery(this).removeClass('wcccf_hide');
			jQuery(this).addClass('wcccf_show_inline');
		}
		else 
		{
			jQuery(this).removeClass('wcccf_show_inline');
			jQuery(this).addClass('wcccf_hide');
		}
	});
}
function wcccf_manage_min_datetime_selectors_visibility(event)
{
	var id = jQuery(event.target).data('id');
	//jQuery('.wcccf_time_min_value_selector_'+id).toggle();
	jQuery('.wcccf_datetime_min_value_selector_'+id).each(function(index, elem)
	{
		if(jQuery(this).hasClass('wcccf_hide'))
		{
			jQuery(this).removeClass('wcccf_hide');
			jQuery(this).addClass('wcccf_show_inline');
		}
		else 
		{
			jQuery(this).removeClass('wcccf_show_inline');
			jQuery(this).addClass('wcccf_hide');
		}
	});
}