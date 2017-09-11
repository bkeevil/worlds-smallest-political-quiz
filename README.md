# worlds-smallest-political-quiz
A Joomla Components that Implements the World's Smallest Political Quiz

### Installation Instructions
Install com_quiz.zip in the usual way.

### Notes
There is no backend for this component, however it does log quiz results to a table xxx_quiz in your Joomla database for later analysis.  There is a really basic token mechanism that may reduce the number of duplicate entries when a user goes back using the back arrow of his browser and changes an answer.  Also, the first couple of digits of the ID field in this table are the month and day the test was submitted.

To customize the color of the dot on the chart see the file components/com_quiz/views/results/tmpl/default.php

Don't change the the size of location of the grid in the image unless you're willing to figure out the matrix rotation in the above file (its a tad complicated).

Cut and paste the following CSS code into your template to help you get started

    div.nolanChartWrapper { text-align: center; }
    table.nolanScores { width: 100%; }
    table.nolanScores td { text-align: center; padding: 10px; }
