<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class QuizModelQuiz extends JModelLegacy
{
    // TODO: Figure out how to put this in language file

	protected $personal_questions = array(
        "Government should not control radio, TV or the press (including books)",
        "Drug laws do more harm than good and should be repealed",
        "There should be no laws or regulations concerning sex between consenting adults",
        "Private clubs and organizations should be free to admit or refuse any member",
        "Government should not interfere in arrangements between doctors and patients"
    );

    protected $economic_questions = array(
        "Businesses and farms should operate without government subsidies",
        "People are better off with free trade than with tariffs",
        "Minimum wage laws cause unemployment and should be repealed",
        "Government should not dictate hiring or employment practices",
        "Union membership should be voluntary, not compulsory"
    );

    protected $personalScore;
    protected $economicScore;

    public function getPersonalQuestions()
    {
        return $this->personal_questions;
    }

    public function getEconomicQuestions()
    {
        return $this->economic_questions;
    }

    public function getPersonalScore()
    {   
        return $this->personalScore;
    }

    public function getEconomicScore()
    {
        return $this->economicScore;
    }

    public function points($ch)
    {
      if ($ch=='y') {
        return 20;
      } else if ($ch=='m') {
        return 10;
      } else
        return 0;
    }

    public function calcScore($arr) 
    {
      return $arr[0] + $arr[1] + $arr[2] + $arr[3] + $arr[4];  
    }

    public function checkIDExists($id)
    {
      $db = $this->getDbo();
      $query = $db->getQuery(true);
      $query->select($db->quoteName('ID'))->from($db->quoteName('#__quiz'))->where($db->quoteName('ID').'='.(int)$id);
      $db->setQuery($query);
      $obj = $db->loadObjectList();
      return (count($obj) > 0);
    }

    public function insertRecord($id,$p,$e)
    {
      $db = $this->getDbo();
      $query = $db->getQuery(true);
      $columns = array('ID','PS','ES','P0','P1','P2','P3','P4','E0','E1','E2','E3','E4');
      $values = array($id,$this->personalScore,$this->economicScore,$p[0],$p[1],$p[2],$p[3],$p[4],$e[0],$e[1],$e[2],$e[3],$e[4]);
      $query->insert($db->quoteName('#__quiz'))->columns($db->quoteName($columns))->values(implode(',', $values));
      $db->setQuery($query);
      $db->execute();
    }

    public function updateRecord($id,$p,$e)
    {
      $db = $this->getDbo();
      $query = $db->getQuery(true);
      $fields = array(
        $db->quoteName('PS').'='.$this->personalScore,
        $db->quoteName('ES').'='.$this->economicScore,
        $db->quoteName('P0').'='.$p[0],
        $db->quoteName('P1').'='.$p[1],
        $db->quoteName('P2').'='.$p[2],
        $db->quoteName('P3').'='.$p[3],
        $db->quoteName('P4').'='.$p[4],
        $db->quoteName('E0').'='.$e[0],
        $db->quoteName('E1').'='.$e[1],
        $db->quoteName('E2').'='.$e[2],
        $db->quoteName('E3').'='.$e[3],
        $db->quoteName('E4').'='.$e[4]);
      $conditions = array(
        $db->quoteName('ID') . '=' . $id
      );
      $query->update($db->quoteName('#__quiz'))->set($fields)->where($conditions);
      $db->setQuery($query);
      $db->execute();
    }


    public function save()
    {
        $jinput = JFactory::getApplication()->input;
        $pa = $jinput->getArray(array('p0' => 'm', 'p1' => 'm', 'p2' => 'm', 'p3' => 'm', 'p4' => 'm'));
        $ea = $jinput->getArray(array('e0' => 'm', 'e1' => 'm', 'e2' => 'm', 'e3' => 'm', 'e4' => 'm'));
        $p = array($this->points($pa['p0']),$this->points($pa['p1']),$this->points($pa['p2']),$this->points($pa['p3']),$this->points($pa['p4']));
        $e = array($this->points($ea['e0']),$this->points($ea['e1']),$this->points($ea['e2']),$this->points($ea['e3']),$this->points($ea['e4']));
        $this->personalScore = $this->calcScore($p);
        $this->economicScore = $this->calcScore($e);
        $id = (int)$jinput->get('random','');
        if ($this->checkIDExists($id)) {
          $this->updateRecord($id,$p,$e);
        } else {
          $this->insertRecord($id,$p,$e);
        }
        return $id;
    }

}

