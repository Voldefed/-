<?php
require_once __DIR__ . "/../database/pdo.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/style.css">
    <title>Exams for date</title>
</head>

<body>
    <div class="container">
        <h2 class="mt mb-3">Екзамени за 3 останні доби:</h2>
        <div class="row">
            <div>
                <table>
                    <thead>
                        <tr>
                            <td>Код</td>
                            <td>Предмет</td>
                            <td>Спеціальність</td>
                            <td>Дата</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <?php
            $exams = $pdo->query("SELECT * FROM `exams` WHERE date > CURDATE() - 3")->FETCHALL(PDO::FETCH_ASSOC);
            foreach ($exams as $exam) {
            ?>
                <div class="table-responsive">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <?= $exam["code"] ?>
                                </td>
                                <td>
                                    <?= $exam["name"] ?>
                                </td>
                                <td>
                                    <?= $exam["specialty"] ?>
                                </td>
                                <td>
                                    <?= $exam["date"] ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>