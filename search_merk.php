<?php
/* Search function and display for Merk Page.
 * Details are taken from PostgreSQL table.
 * 
 * @author Mohammad Khairi Poerwo Satrio, Fadhillah Reza Putranto, Alvin Genta Pratama
 * @version 6.3.20
*/
session_start();
if (isset($_SESSION['login_user']))
{ ?>

<html>
<style>

.nav{
  position: relative;
}
  #left-panel-link {
  position: absolute;
  margin-left: 9.5%;
}
  #right-panel-link {
  position: absolute;
  right: 9.5%;
}
.md-form
{
	position: relative;
}

</style>

<head>
    <link rel="stylesheet" href="theme3.css" >  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Merk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<head>
 <h1><center>Daftar Merk<center></h1>
</head>

<?php
    require_once 'config.php';
?>

	
<nav class="nav nav-pills" id = "left-panel-link">
  <a href="home.php" class="nav-item nav-link active">
    <i class="fa fa-home" ></i> Home
  </a>&nbsp;&nbsp;

  <a href="insert_own.php" class="nav-item nav-link active">
    <i class="fa fa-pencil-square-o" ></i> Insert
  </a>
</nav>

<form action="search_merk.php" class="search-box" id ="right-panel-link" method="post">
  <div class="form-row">
	  <div class"col">
		  <form class="dropdown" id="right-panel-link" action="test_filter.php" method="post">
					<select class="form-control" name="dd_opt">
						<option value="id_merk">ID Merk</option>
						<option value="nama_merk">Merk</option>
					</select>
		</div>
		&nbsp;&nbsp;
		<div class"col">
			<input class="form-control" type="text" name="search_param" placeholders="Search in list">
		</div>
		&nbsp;&nbsp;

    <div class"col">
			<input type="submit" name="submit" class="btn btn-info" value="Go">
		</div>
	
  </div>
		</form>
</form>

<br>
<br>
<div class="container">
<table class="table table-hover">
<br>
	<thead>
		<tr>
			<th>ID Merk</th>
			<th>Merk</th>                   
		 </tr>
	</thead>

  <?php
	//Search parameter
    if (isset($_GET['search_param']))
    {
        $search = $_GET['search_param'];
        echo "<b>Results for " . $search . "</b>";
    }

    if (isset($_GET['select_by']))
    {
        $search_by = $_GET['select_by'];
        echo "<b>Results for " . $search_by . "</b>";
    }
    else
    {
        $search_by = 'nama_merk';
    }

    $select_by = $_POST["dd_opt"];
    $search = $_POST['search_param'];

	//Search query
    if ($select_by == 'id_merk')
    {
        $query = pg_query("SELECT * FROM merk WHERE " . $select_by . " = " . $search . "") or die(error);
    }
    else
    {
        $query = pg_query("SELECT * FROM merk WHERE " . $select_by . " LIKE '%" . $search . "%'") or die(error);
    }
    while ($data = pg_fetch_assoc($query))
    {
?>
    <tr>                 
      <td><?php echo $data['id_merk']; ?></td>
      <td><?php echo $data['nama_merk']; ?></td>
    </tr>
    <?php
    }
?>
  </table>
</div>
<nav class="nav nav-pills" id = "left-panel-link">
    <a href="view_merk.php" class="nav-item nav-link active">
        <i class="fa fa-arrow-left" ></i> Return to View
</html>
  <?php
}

else
{
    header("Location: index.php");
}
