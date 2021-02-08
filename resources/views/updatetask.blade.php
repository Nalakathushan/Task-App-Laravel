<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Update Task</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
     
  </head>
  <body>
      <div class="container">
        <br><br>
        <form method="POST" action="/updateTasks">
          {{csrf_field()}}
          <input type="text" class="form-control" name="task" value="{{$taskdata->task}}"><br>
          <input type="hidden" name="id" value="{{$taskdata->id}}"/>
          <input type="submit" class="btn btn-warning" value="Update"/>
          &nbsp;&nbsp;<input type="button" class="btn btn-danger" value="Cancel"/>
        </form>
      </div>
  </body>
</html>