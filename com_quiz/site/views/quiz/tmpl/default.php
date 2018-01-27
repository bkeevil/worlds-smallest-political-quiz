
<?php
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<div class="politicalQuiz">
<h1><?php echo JText::_('COM_QUIZ_QUIZ_TITLE'); ?></h1>
<p><?php echo JText::_('COM_QUIZ_QUIZ_INTRO_TEXT'); ?></p>
<form action="index.php?option=com_quiz&task=save" method="post">
<table width="100%" class="politicalquiz">
  <tr>
    <th width="*"><?php echo JText::_('COM_QUIZ_PERSONAL_HEADER'); ?></th>
    <th width="50"><?php echo JText::_('COM_QUIZ_AGREE'); ?></th>
    <th width="50"><?php echo JText::_('COM_QUIZ_MAYBE'); ?></th>
    <th width="50"><?php echo JText::_('COM_QUIZ_DISAGREE'); ?></th>
  </tr>
<?php $idx=0; foreach ($this->personalQuestions as $q) : ?>
  </tr>
    <fieldset  id="economics<?php echo $idx; ?>">
    <td><?php echo $q; ?></td>
    <td style="text-align:center"><input type="radio" name="p<?php echo $idx ?>" value="y" /></td>
    <td style="text-align:center"><input type="radio" name="p<?php echo $idx ?>" value="m" /></td>
    <td style="text-align:center"><input type="radio" name="p<?php echo $idx++ ?>" value="n" /></td>
    </fieldset>
  </tr>
<?php endforeach; ?>
</table>
<p></p>
<table width="100%" class="politicalquiz">
  <tr>
    <th width="*"><?php echo JText::_('COM_QUIZ_ECONOMIC_HEADER'); ?></th>
    <th width="50"><?php echo JText::_('COM_QUIZ_AGREE'); ?></th>
    <th width="50"><?php echo JText::_('COM_QUIZ_MAYBE'); ?></th>
    <th width="50"><?php echo JText::_('COM_QUIZ_DISAGREE'); ?></th>
  </tr>
<?php $idx=0; foreach ($this->economicQuestions as $q) : ?>
  </tr>
    <fieldset  id="economics<?php echo $idx; ?>">
    <td><?php echo $q; ?></td>
    <td style="text-align:center"><input type="radio" name="e<?php echo $idx ?>" value="y" /></td>
    <td style="text-align:center"><input type="radio" name="e<?php echo $idx ?>" value="m" /></td>
    <td style="text-align:center"><input type="radio" name="e<?php echo $idx++ ?>" value="n" /></td>
    </fieldset>
  </tr>
<?php endforeach; ?>
</table>
<br />
<input type="hidden" name="random" value="<?php echo date('md'); echo rand(); ?>" />
<input type="submit" value="See Your Results" />
</form>
</div>
