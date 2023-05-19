<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
</head>
<body>
<?php
  include 'koneksi.php';
  $sql = "SELECT * FROM customer";
  $result = mysqli_query($db, $sql);
  ?>
    <table id="example" class="display" style="width:100%">
    <thead>
    <tr>
        <th>No</th>
        <th>First_Name</th>
        <th>Last_Name</th>
        <th>Email</th>
        <th>Phone</th> 
        <th>Address</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php
        if (mysqli_num_rows($result) > 0) {
            $i = 1; 
            while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo $row["first_name"]; ?></td>
                    <td><?php echo $row["last_name"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td>
                        <div class="action" style="display: flex;">
                            <a href="editcustomer_controller.php?first_name=<?php echo $row['first_name'] ?>">Edit</a>|| <a href="delete.php">Delete</a>
                        </div>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php } ?>
        <?php }?>
</tbody>
    <script>

        $(document).ready(function () {
            $('#example').DataTable({
                order: [[3, 'desc']],
            });
        });
        </script>
</body>
</html>

