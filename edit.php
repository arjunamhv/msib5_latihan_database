<?php
    include_once("connection.php");

    if (isset($_POST['update'])) {
        $id = $_POST['id'];

        $nama = $_POST['nama'];
        $matkul = $_POST['matkul'];
        $grade = $_POST['grade'];

        $gradeValues = [
        'A' => 4,
        'B' => 3,
        'C' => 2,
        'D' => 1,
        'E' => 0
    ];

    if (array_key_exists($grade, $gradeValues)) {
        $average = $gradeValues[$grade];
    }


    // script update
    $query = mysqli_query($mysqli,
    "UPDATE grades SET nama='$nama',matkul='$matkul', grade='$grade', average='$average' WHERE id='$id' ");
        header('location: index.php');
    }

    // Ambil data user
    $id = $_GET['id'];

    $query = mysqli_query($mysqli, "SELECT * FROM grades WHERE id='$id'");

    while($user_data = mysqli_fetch_array($query)) {
        $nama = $user_data['nama'];
        $matkul = $user_data['matkul'];
        $grade = $user_data['grade'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Edit</title>
</head>
<body>
<div class="card px-3 py-3 mt-2" style="max-width: 35rem; margin: 0 auto;">
    <h2>Update Data</h2>
    <form action="edit.php" method="POST" name="edit">
      <label for="nama">Nama:</label>
      <input type="text" class="form-control" name="nama" value="<?= $nama ?>" required>
      <br>
      <br>

      <label for="course">Mata Kuliah:</label>
      <input type="text" class="form-control" name="matkul" value="<?= $matkul ?>" required>
      <br>
      <br>

      <label for="grade">Grade:</label>
      <select class="form-select" name="grade" value="<?= $grade ?>"  required>
        <option selected><?= $grade ?></option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
      </select>
        
      <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
      <button type="submit" name="update" class="btn btn-primary mt-4 mb-2">Update</button>
      <a href="index.php"><button type="button" class="btn btn-warning mt-4 mb-2">Kembali</button></a>
    </form>
  </div>
</body>
</html>