<?php
    $dinhkhoi = array(
        'username' => 'dinhkhoi',
        'password' => '123456'
    );
    $anhkiet = array(
        'username' => 'anhkiet',
        'password' => '123'
    );

    // mở file để ghi
    $myFile = fopen("./data.txt","x");

    // ghi file 
    fwrite($myFile, $anhkiet);

    // đóng file
    fclose($myFile);
   /*  $users = array($dinhkhoi, $anhkiet);
    file_put_contents('./data', serialize($users)); */
    
    //$file = file_get_contents('./data', serialize($users));
    //var_dump(unserialize(file_get_contents('./data')));
