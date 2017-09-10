<?php

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class QuizController extends JControllerLegacy
{
    public function save() 
    {
        $model = $this->getModel();
        $id = $model->save();
        $url = 'index.php?option=com_quiz&view=results&PersonalScore='.$model->getPersonalScore().'&EconomicScore='.$model->getEconomicScore();
        $this->setRedirect($url);
    }

}
