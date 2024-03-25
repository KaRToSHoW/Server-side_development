<!doctype html>
<html lang="en">

<head>
    <title>Notebook</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .selected {
            font-weight: bold;
            color: blue;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if (isset($_GET['p']) && $_GET['p'] == 'view') echo '<li class="nav-item active">' ?>
                    <a class="nav-link <?php if (isset($_GET['p']) && $_GET['p'] == 'view') echo 'active' ?>" href="?p=view">View <span class="sr-only">(current)</span></a>
                    </li>
                    <?php if (isset($_GET['p']) && $_GET['p'] == 'add') echo '<li class="nav-item active">' ?>
                    <a class="nav-link <?php if (isset($_GET['p']) && $_GET['p'] == 'add') echo 'active' ?>" href="?p=add">Add</a>
                    </li>
                    <?php if (isset($_GET['p']) && $_GET['p'] == 'update') echo '<li class="nav-item active">' ?>
                    <a class="nav-link <?php if (isset($_GET['p']) && $_GET['p'] == 'update') echo 'active' ?>" href="?p=update">Update</a>
                    </li>
                    <?php if (isset($_GET['p']) && $_GET['p'] == 'delete') echo '<li class="nav-item active">' ?>
                    <a class="nav-link <?php if (isset($_GET['p']) && $_GET['p'] == 'delete') echo 'active' ?>" href="?p=delete">Delete</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <?php
        $o = isset($_GET['o']) ? $_GET['o'] : '';
        if ($_GET['p'] == 'view') : ?>
            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                <a href="?p=view&o=id" class="btn btn-secondary <?php echo ($o == 'id') ? 'active' : ''; ?>">Id</a>
                <a href="?p=view&o=date" class="btn btn-secondary <?php echo ($o == 'date') ? 'active' : ''; ?>">Date</a>
                <a href="?p=view&o=lastname" class="btn btn-secondary <?php echo ($o == 'lastname') ? 'active' : ''; ?>">Lastname</a>
            </div>
        <?php endif; ?>