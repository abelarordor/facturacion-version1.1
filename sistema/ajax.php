<?php
 if($_POST['action'] =='searchCliente')
 {   

    if (!empty($_POST['cliente'])) {
        $nit= $_POST['cliente'];
        $query = mysqli_query($conection,"SELECT * FROM cliente WHERE nit LIKE '$nit' and estatus=1");
        mysqli_close($conection);
        $result =mysqli_num_rows($query);
        $data='';
        if ($result>0) {
            $data=mysqli_fetch_assoc($query);

        }else{
            $data=0;
        }
        echo json_encode($data,JSON_UNESCAPED_UNICODE);


    }
    exit;
 }
exit;
?>