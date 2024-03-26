<?php
    $rows_view = 5;
    
    $sql = 'SELECT COUNT(*) FROM `friends`';
    $res = mysqli_query($connect, $sql);
    $rows = mysqli_fetch_row($res)[0];

    $sql = 'SELECT * FROM `friends` ORDER BY `' . $_GET['o'] . '` LIMIT '.$_GET['page']*$rows_view.','.$rows_view.'';
    $res = mysqli_query($connect, $sql);
    if (mysqli_errno($connect)) print_r(mysqli_stmt_error($connect));
    $pages = ceil($rows/$rows_view);
?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">FirstName</th>
            <th scope="col">Name</th>
            <th scope="col">Lastname</th>
            <th scope="col">Gender</th>
            <th scope="col">Date</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Adress</th>
            <th scope="col">Comment</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($res)) : ?>
            <tr>
                <th scope="row"><?= $row['id']; ?></th>
                <td><?= $row['firstname']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['lastname']; ?></td>
                <td><?= $row['gender']; ?></td>
                <td><?= $row['date']; ?></td>
                <td><?= $row['phone']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['adress']; ?></td>
                <td><?= $row['comment']; ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<nav aria-label="...">
    <ul class="pagination pagination-sm">
        <?php for($i = 0; $i < $pages; $i++): ?>
            <li class="page-item <?php if(isset($_GET['page']) && $_GET['page'] == $i) echo 'active'; ?>">
                <a class="page-link" href="<?=$_SERVER['SCRIPT_NAME'];?>?page=<?=$i;?>&o=<?=$_GET['o'];?>"><?=$i+1?></a>
            </li>
        <?php endfor;?>
    </ul>
</nav>
