<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class QuizViewQuiz extends JViewLegacy
{
	function display($tpl = null)
	{

		// Assign data to the view
		$this->personalQuestions = $this->get('PersonalQuestions');
        	$this->economicQuestions = $this->get('EconomicQuestions');
        	$app = JFactory::getApplication();
        	$menu = $app->getMenu();
        	$active = $menu->getActive();
        	$this->Itemid = $active->id;
		
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');

			return false;
		}

		// Display the view
		parent::display($tpl);
	}
}
