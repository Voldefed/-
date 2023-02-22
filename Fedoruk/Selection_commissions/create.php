<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/style1.css">
</head>

<body>
<main>
<div class="edit_center text_style">
            <div class="col-6">
                <h2 class="text_style style-big">Додати інформацію про вибіркову комісію</h2>
                <form action="store.php" method="POST">
                    <div class="mb-3">
                        <label for="Input1" class="form-label">Член вибіркової комісії</label>
                        <input type="text" name="members_name" class="form-control" id="Input1">
                    </div>
                    <div class="mb3">
                        <label for="Input2" class="form-label">Графік роботи</label>
                        <input type="text" name="work_schedule" class="form-control" id="Input2">
                    </div>
                    <div class="mb3">
                        <label for="Input3" class="form-label">Що робить?</label>
                        <input type="text" name="what_does" class="form-control" id="Input3">
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Дoдати</button>
                </form>
            </div>
        </div>
</main>
</body>

</html>