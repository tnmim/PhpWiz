<?php
        $id = $_SESSION['user_id'];
        $result = mysqli_query($conn,"SELECT flag FROM user WHERE id=$id LIMIT 1");
	 $row = mysqli_fetch_assoc($result);
	if ($row['flag'] == 2) { 
	?>
		<script>
    	$('#myModal').modal('hide');
    	</script>
	<?php }else {?>
	<script>
    	$('#myModal').modal('show');
    	console.log("Sdf");
    	</script>
    	<?php
    }
    ?>