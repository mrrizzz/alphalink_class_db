<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Upload</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="ml-5">
  <div>
    <h2>Upload File</h2>
    <form class="flex flex-col justify-center w-1/2" action="" method="post" enctype="multipart/form-data">
      Pilih file untuk diunggah:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
      <input type="text" id="first_name" name="content"
        class="w-1/5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block py-1 pl-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="Konten" required />
      <button type="submit" value="Unggah File" name="submit"
        class="w-1/5 py-1 mt-5 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">upload
        file</button>
    </form>
  </div>

  <?php
  include 'connect.php';
  
  if (isset($_POST["submit"])) {
    $targetDirectory = "uploads/"; 
  

    $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));


    if (file_exists($targetFile)) {
      echo "Maaf, file tersebut sudah ada.";
    } else {
     
      if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Maaf, file terlalu besar.";
      } else {

        if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" && $fileType != "pdf") {
          echo "Maaf, hanya file JPG, JPEG, PNG, & GIF yang diperbolehkan.";
        } else {
 
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "File " . basename($_FILES["fileToUpload"]["name"]) . " berhasil diunggah.";
          
            $fileName = basename($_FILES["fileToUpload"]["name"]);
            $filePath = $targetFile;
            $fileSize = $_FILES["fileToUpload"]["size"];
            $fileContent = $_POST['content'];
            $sql = "INSERT INTO upload_table (name, size , type , content, path) VALUES ('$fileName','$fileSize', '$fileType','$fileContent', '$filePath')";
            $display = "";
            if ($connectdb->query($sql)) {
              echo "Data file berhasil ditambahkan ke database.";


            } else {
              echo "Error: " . $sql . "<br>" . $connectdb->error;
            }

       
            $connectdb->close();
          } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
          }
        }
      }
    }
  }
  ?>
  <table class="table-auto w-8/12 border mt-5 border-black-300">
    <thead>
      <tr>
        <th class="border-2 border-black">No</th>
        <th class="border-2 border-black">Nama</th>
        <th class="border-2 border-black">Type</th>
        <th class="border-2 border-black">Ukuran</th>
        <th class="border-2 border-black">Deskripsi</th>
        <th class="border-2 border-black">Download</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include 'connect.php';
      $sql = "SELECT * FROM upload_table";
      $result = $connectdb->query($sql);
      if ($result->num_rows > 0) {
        $counter = 1;
        while ($row = $result->fetch_assoc()) {
          $download = $row['path'];
          echo '<tr>';
          echo '<td class="border-2 border-black text-center">' . $row['id'] . '</td>';
          echo '<td class="border-2 border-black text-center">' . $row['name'] . '</td>';
          echo '<td class="border-2 border-black text-center">' . $row['type'] . '</td>';
          echo '<td class="border-2 border-black text-center">' . $row['size'] . '</td>';
          echo '<td class="border-2 border-black text-center">' . $row['content'] . '</td>';
          // echo '<td class="border-2 border-black text-center"> <a href= ' . $download . " target='_blank'>Download</a></td>";
          echo '<td class="border-2 border-black text-center"> <a href="' . $download . '" target="_blank">Download</a></td>';

          echo ' </tr>';
          $counter++;
        }
      } else {
        echo '<tr>';
        echo '<td class="border-2 border-black text-center py-3" colspan=8>Belum ada isinya</td>';
        echo '</tr>';
      }
      ?>
    </tbody>
  </table>
</body>

</html>