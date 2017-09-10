<?php
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<div class="quizResults">
<h3><?php JText::_(COM_QUIZ_RESULTS_TITLE); ?></h3>
<p><?php JText::_(COM_QUIZ_RESULTS_INTRO_TEXT); ?></p> 
<p><?php JText::_(COM_QUIZ_PERSONAL_FREEDOM_SCORE).' '.$this->personalScore; ?>/100</p> 
<p><?php JText::_(COM_QUIZ_ECONOMIC_FREEDOM_SCORE).' '.$this->economicScore; ?>/100</p>

<div class="nolanChartWrapper">
  <canvas id="quizResults" height="640" width="640"></canvas>
  <script>
   var canvas = document.getElementById('quizResults');
   var context = canvas.getContext('2d');
   var imageObj = new Image(640,640);
   /* Actual coordinates measured on the image are as follows:
        Left=66,309
        Center=321,309
        Right=577,309
        Top=321,55
        Bottom=321,564 */

   var icx=321, icy=309; // Center of the actual image 

   /* The graph in the image, if rotated clockwise 45 degrees, would be a 360x360 pixel square.
      So the coordinate system we need to convert to is -180 to 180 pixels with the origin (0,0) 
      in the center.  This code does that. */

   var scale = 3.6;    // Scale factor to convert scores to image coordinates. (180/50)
   var x = (<?php echo $this->personalScore; ?>-50)*scale; // -180 <= x <= 180  
   var y = (<?php echo $this->economicScore; ?>-50)*scale; // -180 <= y <= 180

   // Now we need to rotate the coordinate plane -45 degrees around the origin using a matrix rotation 

   var angle = -45; // Angle to rotate plane of scores to plane of image coordinates
   var radians = (Math.PI / 180) * angle;  // convert rotation angle to radians
   var cos = Math.cos(radians); 
   var sin = Math.sin(radians);
   var cx=0, cy=0;
   var nx = (cos * (x - cx)) + (sin * (y - cy)) + cx; // x coordinate of dot, relative to center
   var ny = (cos * (y - cy)) - (sin * (x - cx)) + cy; // y coordinate of dot, relative to center

   // Now we have to adjust the coordinate plane to match the image where the origin is in the top left corner 
   nx = icx - nx; // Adjust coordinates to image pixels
   ny = icy - ny; // Adjust coordinates to image pixels

   // Don't draw on the canvas until after the image has loaded 
   var radius = 6; // Radius of circle
   imageObj.onload = function() {
     context.drawImage(imageObj,0,0);
     context.beginPath();
     context.arc(nx, ny, radius, 0, 2 * Math.PI, false);
     context.fillStyle = 'green';          // color of circle
     context.fill();
     context.lineWidth = 3;                // thickness of circle border
     context.strokeStyle = '#003300';      // color of circle border
     context.stroke();
   };
   imageObj.src = '/media/com_quiz/politicalquiz.jpg'; // url of nolan chart background image
 </script>
  </div>
</div>

