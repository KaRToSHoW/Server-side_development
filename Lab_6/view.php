<?php
    if (!isset($_GET['o'])) $_GET['o'] ='id';
    
    $pages = 5;
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
    $offset_page = ($page - 1) * $pages;
    
    $sql = 'SELECT * FROM `friends` ORDER BY `' . $_GET['o'] . '` LIMIT ' . $offset_page . ', ' . $pages;
    $res = mysqli_query($connect, $sql);
    if (mysqli_errno($connect)) print_r(mysqli_error($connect));
    
    $row = mysqli_num_rows($res);
    $total_rows_query = mysqli_query($connect, 'SELECT COUNT(*) as total FROM `friends`');
    $total_rows = mysqli_fetch_assoc($total_rows_query)['total'];
    $total_pages = ceil($total_rows / $pages);
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
        <?php for($i = 1; $i <= $total_pages; $i++):?>
            <li class="page-item <?= $page == $i ? 'active' : '' ?>"><a class="page-link" href="<?=$_SERVER['SCRIPT_NAME'];?>?page=<?=$i;?>"><?=$i?></a></li>
        <?php endfor;?>
    </ul>
</nav>
