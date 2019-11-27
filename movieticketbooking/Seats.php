<?php// Select all the seats in the venue
// The seat numbers in the concert hall were read from right to left
// (which is why columnId is sorted as desc)
require 'common.php';
$query = "SELECT * from seats order by rowId, columnId desc;";
$result = mysql_query($query);
 
// Iterate through results, assign values to rowId, columnId,
// status and updatedBy variables
while (list($rowId, $columnId, $status, $updatedby)= mysql_fetch_row($result));
       echo &quot;\n
&amp;amp;lt;td bgcolor='$seatColor' align='center'&amp;amp;gt;&quot;;
echo &quot;$rowId$columnId&quot;;
 
if ($status == 0
   || ($status == 1
      &amp;amp;amp;&amp;amp;amp; $updatedby == $_SERVER['PHP_AUTH_USER'])) {
   echo &quot;&amp;amp;lt;input type='checkbox' name='seats[]'&quot;
      . &quot; value='$rowId$columnId'&amp;amp;gt;&amp;amp;lt;/checkbox&amp;amp;gt;&quot;;
 
        ?>