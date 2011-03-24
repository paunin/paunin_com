<?php
$num_pages = ceil($overall / $display);
if ($num_pages)
{
?>

    <div class="paginator" align="right">
    <?=$currPage?'<a href="'.str_replace('__page__',(string)($currPage - 1),$baseUrl).'">&larr;предыдущая</a>':''?>
    
    <?php
       
        $mt=false;
        for ($i = 0; $i < $num_pages; $i++)
        {
            if(
                (
                    $i<($currPage-ceil(($numGroup-1)/2))||
                    $i>($currPage+ceil(($numGroup-1)/2))
                )&&(
                    $i>($numGroup-1)&&
                    $i<($num_pages-$numGroup)
                )
            ){
              if(!$mt) echo '...';
              $mt='true';  
            }else{
                $mt=false;
                echo    '<a href="' . (($currPage != $i)?str_replace('__page__',(string)$i,$baseUrl):'#') . '"' . (($currPage==$i)?'class="curr_page"':'') . '>'.($i + 1).'</a>';
            }
            
        }
    
    ?>
    
    <?= ($num_pages-1)!=$currPage?'<a href="'.str_replace('__page__',(string)($currPage + 1),$baseUrl).'">следующая&rarr;</a>':'' ?>
    
    </div>
<?php
}
?>