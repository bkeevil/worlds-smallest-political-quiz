<?php

defined('_JEXEC') or die('Restricted access');

class QuizTableQuiz extends JTable
{
    var $ID = 0;
    var $P0 = 0;
    var $P1 = 0;
    var $P2 = 0;
    var $P3 = 0;
    var $P4 = 0;
    var $E0 = 0;
    var $E1 = 0;
    var $E2 = 0;
    var $E3 = 0;
    var $E4 = 0;

	function __construct(&$db)
	{
		parent::__construct('#__quiz', 'id', $db);
	}
}
