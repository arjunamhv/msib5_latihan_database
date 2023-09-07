<?php

include_once("connection.php");

$result = mysqli_query($mysqli, 'SELECT * FROM grades');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
  <div class="card px-3 pb-3 mt-2" style="max-width: 800px; margin: 0 auto;" >
  <a href="add.php"><button type="button" class="btn btn-primary my-3">Tambah Data</button></a>
    <table class="table table-bordered" style="text-align: center;">
      <tr>
        <th>Nama</th>
        <th>Mata Kuliah</th>
        <th>Grade</th>
        <th>Nilai Rata-rata</th>
        <th>Action</th>
      </tr>
      <?php
        while ($data_nilai = mysqli_fetch_array($result)) {
        ?>
        <tr>
        <td><?php echo $data_nilai['nama'];?> </td>
        <td><?php echo $data_nilai['matkul'];?> </td>
        <td><?php echo $data_nilai['grade'];?> </td>
        <td><?php echo $data_nilai['average'];?> </td>
        <td>
            <a href="edit.php?id=<?php echo $data_nilai['id'];?>"><button type="button" class="btn btn-warning" style="display:inline-block">Edit</button></a>
            <a href="delete.php?id=<?php echo $data_nilai['id'];?>"><button type="button" class="btn btn-danger" style="display:inline-block">Delete</button></a>
            
        </td>
        </tr>
        <?php
        }   
        ?>
    </table>
  </div>

</body>

</html>