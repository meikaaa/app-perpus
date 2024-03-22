<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
<div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header"><h5 class="text-center">LOGIN</h5></div>
            
            <div class="card-body">
              <form action="proses_login.php" method = "post">

                <div class="form-group">
                  <input type="text" name="username" class="form-control" placeholder="Username">
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="" placeholder="Password">
                </div>

                <div class="form-group">
                  <input type="submit" value="Login" class="btn btn-primary btn-block">
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>