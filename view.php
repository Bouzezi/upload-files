<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td {
             border: 1px solid black;
             border-collapse:collapse;
        }
    </style>
</head>
<body>
    <?php 
    // Include the database configuration file  
    require_once 'dbConfig.php'; 
    
    // Get image data from database 
    $result = $db->query("SELECT * FROM images ORDER BY uploaded DESC"); 
    ?>

    <?php if($result->num_rows > 0){ ?> 

        <table>
                <tr>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            <?php while($row = $result->fetch_assoc()){ ?>
                <tr>
                    <td>
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" width="200" height="200"/> 
                    </td>
                    <td>
                        <a href="delete.php?id=<?php echo $row["id"]; ?>&pageName=<?php echo 'image'; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?> 
            </table>
    <?php }else{ ?> 
        <p class="status error">Image(s) not found...</p> 
    <?php } ?>
</body>
</html>

