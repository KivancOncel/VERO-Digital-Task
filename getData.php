<?php 
    include("curl_class.php");
    $getApi = new getCurl();
    $data = $getApi->get_data_from_api();
?>
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