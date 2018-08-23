<p>Chamba District Data Goes Here</p>

 <p onclick="sendFirstCategory();"> District ID is: 

<?php

  echo $id;

?>

</p> 


<script type="text/javascript">
    

function sendFirstCategory(){

    var csrfToken = $('meta[name="csrf-token"]').attr("content");

        alert("This is Not Me"  + csrfToken);
        var test = "this is an ajax test";

        $.ajax({
            url: '<?=Yii::$app->getUrlManager()->createUrl('site/ajax') ?>',
            type: 'POST',
             data: { test: test , _csrf : csrfToken},
             success: function(data) {
                 alert(data);

             }
         });
    }


</script>