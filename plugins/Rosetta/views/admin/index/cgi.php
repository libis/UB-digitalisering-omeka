<div class='result'>
<?php
    $base_url = get_option('rosetta_resolver');
    $html='';

    if($list = rosetta_get_list($base_url."/".urlencode($_GET['search'])."/list")):
        foreach ($list as $key => $rep):
            //var_dump($rep['content']);echo '<br><hr><br>';
            $content = $rep['content'];
            foreach($content as $fl => $file):
              echo $fl."<br>";
              echo "<div class='rosetta_image child'><img alt='".$file['label']."' src='".$base_url."/".$fl."'/><Input type = 'Radio' Name ='pid' value= '".$fl."'>
              </div>";
            endforeach;
            echo '<br><hr><br>';          
        endforeach;
        //echo $html;
    else:?>
    <p>No results found</p>
    <?php endif;?>
</div>
