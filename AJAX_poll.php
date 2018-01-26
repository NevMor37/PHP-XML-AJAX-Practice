<?php
     $p = $_REQUEST['p'];
     $p = intval($p);
     $filename = "uploads/poll_vote.txt";
     $content = file($filename);
     //echo $content['']; 一个cell相当于一行 以string形式存储
     $array = explode("||", $content[0]);
     $y = intval($array[0]);
     $n = intval($array[1]);
     if($p == 1){
         $y++;
     }else{
         $n++;
     }
     //file writting
     $overwriteVote = $y."||".$n;
     $fp = fopen($filename, "w");
     fwrite($fp, $overwriteVote);
     fclose($fp);
?>
<h2>Result:</h2>
<table>
    <tr>
        <td>Yes:</td>
        <td>
             <img src = "uploads/poll.jpg" width = '<?php echo (100*round($y/($n+$y), 2));?>' height = '20'>
             <?php echo (100*round($y/($y+$n), 2))."%";?>
        </td>
    </tr>
    <tr>
        <td>No:</td>
        <td>
            <img src = "uploads/poll.jpg" width = '<?php echo (100*round($n/($n+$y), 2));?>' height = '20'>
            <?php echo (100*round($n/($y+$n), 2))."%";?>
        </td>
    </tr>
</table>