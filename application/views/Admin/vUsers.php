<html>
<head>
    <title></title>
</head>
<body>
<h1></h1>

<h3>Lista użytkowników</h3>

<table>
    <tr>
        <td>Id</td>
        <td>Nazwa</td>
        <td>e-mail</td>
        <td>Rola</td>
    </tr>

    <?php foreach ($users->result() as $item):?>

        <?php echo '<tr>
                        <td>'. $item->id.'</td>
                        <td>'. $item->name.'</td>
                        <td>'. $item->email.'</td>
                        <td>'. $item->role.'</td>
                        <td><a href="get/'.$item->id.'">Edytuj</a></td>
                        <td><a href="delete/'.$item->id.'">Usuń</a></td>
                    </tr>';?>

    <?php endforeach;?>
</table>

</body>
</html>