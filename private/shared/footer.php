

	<script type="text/javascript">
        
 	var imgCount = 6;
    var dir = 'http://localhost/~margarethahaughwout/apriori/public/images/';
    var randomCount = Math.round(Math.random() * (imgCount - 1)) + 1;
    var images = new Array
            images[1] = "bg-01.png",
            images[2] = "bg-02.png",
            images[3] = "bg-03.png",
            images[4] = "bg-04.png",
            images[5] = "bg-05.png",
            images[6] = "bg-06.png",
            
    document.body.style.background = "url(" + dir + images[randomCount] + ")";
    document.body.style.backgroundSize= "800px";
    document.body.style.backgroundRepeat= "no-repeat";

        //----^----for not repeat the background
    </script>



</body>
</html>

<?php

db_disconnect($db);

?>