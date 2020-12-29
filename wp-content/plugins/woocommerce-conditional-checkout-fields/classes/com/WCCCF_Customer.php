<?php 
class WCCCF_Customer
{
	public function __construct()
	{
	}
	public function get_user_roles()
	{
		global $wp_roles;
		return $wp_roles->roles;
	}
	public function customer_satisfy_conditional_rule($condition)
	{
		$user = wp_get_current_user();
		$user_roles = array();
		
		if($user->ID == 0)
			$user_roles[] = 'not_logged';
		else 
		{
			$user_roles = $user->roles;
		}
		
		//user_operator -> at_least_one || has_all || has_none
		if($condition['user_operator'] == 'at_least_one')
			return count(array_intersect($user_roles, $condition['user_role'])) > 0;
		else if($condition['user_operator'] == 'has_all')
			return count(array_intersect($user_roles, $condition['user_role'])) == count($user_roles);
		else if($condition['user_operator'] == 'has_none')
			return count(array_intersect($user_roles, $condition['user_role'])) == 0;
		
		return true;
	}
}
?>