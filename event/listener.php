<?php
/**
*
* @package Remove Inactive Mebers Extension
* @copyright (c) 2019 david63
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace david63\inactivememb\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{
	/**
	* Constructor for listener
	*
	* @return \david63\inactivememb\event\listener
	* @access public
	*/
	public function __construct()
	{

	}

	/**
	* Assign functions defined in this class to event listeners in the core
	*
	* @return array
	* @static
	* @access public
	*/
	static public function getSubscribedEvents()
	{
		return array(
			'core.memberlist_modify_sql_query_data'	=> 'modify_memberlist',
		);
	}

	public function modify_memberlist($event)
	{
		$sql_where = $event['sql_where'];
		$sql_where .= ' AND user_type <> ' . USER_INACTIVE;
		$event['sql_where'] = $sql_where;
	}

}
