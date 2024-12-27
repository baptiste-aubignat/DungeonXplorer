<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DungeonXplorer</title>
    <link rel="icon" href="<?php echo BASE_URL; ?>/images/Logo.png" type="image/png">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/styles/bulma.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pirata+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <?PHP
        if (isset($_SESSION["user"])) {
            require_once("part/header.php");
        } else {
            require_once("part/headerOff.php");
        }
        ?>
    </header>


    <main>
        <div class="container">
            <div class="box boxMenu panelAdmin">
                <h1>Modération</h1>
                <div class="texte">
                    <div class="container">
                        <table class="table is-striped is-hoverable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pseudonyme</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($users)): ?>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?php echo $user['account_id']; ?></td>
                                            <td><?php echo $user['name']; ?></td>
                                            <td><?php echo $user['email']; ?></td>
                                            <td>
                                                <form method="post" action="<?php echo BASE_URL; ?>/administration" onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
                                                    <input type="hidden" name="account_id" value="<?php echo $user['account_id']; ?>">
                                                    <button type="submit" class="button is-danger">Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4">Aucun utilisateur trouvé.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </main>

    <footer>
        <?PHP require_once("part/footer.php"); ?>
    </footer>
</body>

</html>