<div class="contentWarp wStaticPx">
        <?php
        if($activeStatus == 'actived'){
            echo $language[$view->view]->msgComplete;
            echo  ' <a href="/home">'.$language[$view->view]->linkComplete.'</a>';
        }else{
            echo $language[$view->view]->msgErrorActived;
        }
       ?> 
</div>
