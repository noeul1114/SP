<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpProject</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
  <body>
    <br>
    <div class="container">
      <form action="../action/TComment_insert.php" method="POST" class="form-horizontal">
          <!-- Task Name -->
          <div class="form-group">
              <label for="COMMENT" class="col-sm-3 control-label">한마디</label>

              <div class="col-sm-6">
                  <input type="text" name="COMMENT" id="name" class="form-control">
              </div>
          </div>

          <!-- Add Task Button -->
          <div class="form-group">
              <div class="col-sm-offset-3 col-sm-6">
                  <button type="submit" class="btn btn-default">
                      <i class="fa fa-plus"></i> 작성완료
                  </button>
              </div>
          </div>
      </form>
    </div>
  </body>
</html>
