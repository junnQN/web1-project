<?php
$members = array();
$file = './data.txt';
if (file_exists($file)) {
    $r = fopen($file, "r");
    while (!feof($r)) {
        $row = fgets($r);
        if(!empty($row)){
            $members[] = explode('|', $row);
        }
    }
}
$dinhkhoi = array(
    'username' => 'dinhkhoi',
    'password' => '123456'
);
$anhkiet = array(
    'username' => 'anhkiet',
    'password' => '123456'
);
$users = array($dinhkhoi,$anhkiet);
echo '<pre>';
print_r($users);


echo '<pre>';
print_r($members);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>

<body>
    <table style="border: 1px solid black"> 
        <tr>
            <th>No.</th>
            <th>Username</th>
            <th>Password</th>
        </tr>
        <?php
            if(isset($members)){
                foreach($members as $k => $member){
                    ?>
                    <tr>
                        <td><?php echo ($k + 1); ?></td>
                        <td><?php echo $member[0]; ?></td>
                        <td><?php echo $member[1]; ?></td>
                    </tr>
                    <?php
                }
            }
        ?>
    </table>
</body>

</html>