<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class QuizViewResults extends JViewLegacy
{
        function display($tpl = null)
        {
            $jinput = JFactory::getApplication()->input;

            $this->personalScore = $jinput->getInt('PersonalScore',0);
            $this->economicScore = $jinput->getInt('EconomicScore',0);

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

