<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Reset Password</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="send_email.php" method="post">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input class="form-control" type="email" name="email" placeholder="email">
                    </div>
                    <button class="btn btn-success" type="submit" name="reset">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>