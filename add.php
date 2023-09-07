<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Calculate</title>
</head>

<body>
    <div class="card px-3 py-3 mt-2" style="max-width: 35rem; margin: 0 auto;">
        <h2>Hitung Nilai Rata-rata</h2>
        <form action="add.php" method="POST" name="calculate">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" name="nama" required>
            <br>
            <br>

            <label for="course">Mata Kuliah:</label>
            <input type="text" class="form-control" name="matkul" required>
            <br>
            <br>

            <label for="grade">Grade:</label>
            <select class="form-select" name="grade" required>
                <option selected>Pilih Grade</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select>

            <button type="submit" name="submit" class="btn btn-primary mt-4 mb-2">Hitung</button>
            <a href="index.php"><button type="button" class="btn btn-warning mt-4 mb-2">Kembali</button></a>
        </form>
    </div>
</body>
<?php
if (isset($_POST['submit'])) {
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

    include_once("connection.php");

    $result = mysqli_query(
        $mysqli,
        "INSERT INTO grades (nama,matkul,grade,average) VALUES ('$nama', '$matkul', '$grade', '$average') "
    );
    header('location: index.php');
}
?>

</html>