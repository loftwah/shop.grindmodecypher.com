<?php 
function wcccf_url_exists($url) 
{
    $headers = @get_headers($url);
	if(strpos($headers[0],'200')===false) return false;
	
	return true;
}
function wcccf_file_exists($path) 
{
    return file_exists($path);
}
$wcccf_result = get_option("_".$wcccf_id);
$wcccf_notice = !$wcccf_result || $wcccf_result != md5($_SERVER['SERVER_NAME']);
$wcccf_notice = false;
/* if($wcccf_notice)
	remove_action( 'plugins_loaded', 'wcccf_setup'); */
if(!$wcccf_notice)
	wcccf_setup();
function wcccf_get_value_if_set($data, $nested_indexes, $default = false)
{
	if(!isset($data))
		return $default;
	
	$nested_indexes = is_array($nested_indexes) ? $nested_indexes : array($nested_indexes);
	//$current_value = null;
	foreach($nested_indexes as $index)
	{
		if(!isset($data[$index]))
			return $default;
		
		$data = $data[$index];
		//$current_value = $data[$index];
	}
	
	return $data;
}
?>