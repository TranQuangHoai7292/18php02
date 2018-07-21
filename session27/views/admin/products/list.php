<?php 
	include 'views/admin/common/header.php';
	include 'controller/admin_controller.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">List products</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div>
    <?php
    $stt=1
    while ($data = mysqli_fetch_array($result)) {
    ?>
		<tr>
            <th scope="row"><?php echo $stt++ ?></th>
            <td><?php echo $data["role"]; ?></td>
            <td><?php echo $data["username"]; ?></td>
            <td><?php echo $data["password"]; ?></td>
    	</tr>
    <?php
	}
	?>
    </div>
</div>
<!-- /#page-wrapper -->
<?php include 'views/admin/common/footer.php';?>
