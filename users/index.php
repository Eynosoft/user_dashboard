<?php

include('header.php');

if(isset($_POST['update'])){
    $user = $obj->getUserById();
    $_SESSION['user'] = pg_fetch_object($user);
    header('location:edit.php');
}

if(isset($_POST['delete'])) {
   $ret_val = $obj->deleteuser();
   if($ret_val==1){
      echo "<script language='javascript'>";
      echo "alert('Record Deleted Successfully')";
      echo "</script>";
    }
    header('location:index.php');
}

?>
<div class="container-fluid bg-3 text-center">    
  <h3>--- User Details ---</h3>
  <a href="adduserfrm.php" class="btn btn-primary pull-right" style='margin-top:-30px'><span class="glyphicon glyphicon-plus-sign"></span> Add User Record</a>
  <br>
  <div class="panel panel-primary">
        <div class="panel-heading">Users</div>
             
            <div class="panel-body">
            <table class="table table-bordered table-striped" id="table_id">
    <thead>
      <tr class="active">
            <th>User Id</th>  
            <th>Name</th>       
            <th>Email</th>
            <th>Created Date</th>
            <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php while($user = pg_fetch_object($users)): ?>   
      <tr align="left">
        <td ><?=$user->uid ?></td>
        <td><?=$user->first_name.' '.$user->last_name?></td>
        <td><?=$user->email?></td>
        <td><?= $user->createddate ?></td>
        <td>
            <form method="post">
                <!-- <input type="submit" class="btn btn-success" name= "update" value="Update">    -->
                <input type="submit" onClick="return confirm('Please confirm deletion..');" class="btn btn-danger" name= "delete" value="Delete">
                <input type="hidden" value="<?=$user->uid?>" name="uid">
            </form>
        </td>
      </tr>
    <?php endwhile; ?>   
    </tbody>
  </table>
</div>
 
</div>
</div>  
<?php include('footer.php');?>