<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
class JFormRuleName extends JFormRule
{
	protected $regex = '^[^0-9]+$';
}