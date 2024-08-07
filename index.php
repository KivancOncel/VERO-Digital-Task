<?php 
    include("curl_class.php");
    $getApi = new getCurl();
    $data = $getApi->get_data_from_api();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <title>S. Kivanc ONCEL Task</title>

    <link rel="stylesheet" href="css/style.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/main.js"></script>

</head>
<input id="searchData" type="text" placeholder="Search..">
<a href="#" id="openModal">Open Modal</a>
<table border="1">
    <tr>
        <th>Task</th>
        <th>Title</th>
        <th>Description</th>
    </tr>
    <tbody id="getCurl">
<?php
    foreach($data as $key => $value) {
?>
    <tr bgColor="<?php echo $value['colorCode']; ?>">
        <td><?php echo $value['task'] ?></td>
        <td><?php echo $value['title'] ?></td>
        <td><?php echo $value['description'] ?></td>
    </tr>
<?php 
    }
?>
    </tbody>
</table>
<div id="modal">    
    <form id="uploadForm" method="POST" action="" enctype="multipart/form-data">
        <a href="#" id="closeModal">X</a>
        <input type="file" name="image" id="image" />
        <input type="submit" value="Submit" title="Submit" />
        <div id="uploadedImage"></div>
    </form>
</div>