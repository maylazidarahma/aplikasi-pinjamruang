<?php echo $this->session->flashdata('hasil'); ?>
<table border="1">
    <tr>
        <th style="text-align:center;">ID</th>
        <th>NAMA</th>
        <th>username</th>
        <th>password</th>
        <th>level</th>
    </tr>
    <?php   
    $no=1;
        foreach ($datauser as $l) {
            echo '<tr>                          
        <td>'.$no.'</td>
        <td>'.$l->nama.'</td>
        <td>'.$l->username.'</td>
        <td>'.$l->password.'</td>
        <td>'.$l->nama_lvl.'</td>
        <tr>';
        $no++;
        }   
    ?>
</table>