<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Task App</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
     
  </head>
  <body>
    <div class="container">
      <div class="text-center">
        <h1>Daily Task App</h1>
        <div class="row">
          <div class="col-md-12">
            @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
              {{$error}}
            </div>
            @endforeach
           <form method="POST" action="/saveTask">
            {{csrf_field()}}
            <input type="text" class="form-control" name="task" placeholder="Enter Your Task">
          </br>
            <input type="submit" class="btn btn-primary" value="Save">
            <input type="submit" class="btn btn-warning" value="Clear">
          </form>
          <br>
            <table class="table table-dark">
              <th>ID</th>
              <th>Task</th>
              <th>Completed</th>
              <th>Action</th>
              @foreach($tasks as $task)
              <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->task}}</td>
                @if($task->isCompleted)
                <td><button class="btn btn-success">Completed</button></td>
                @else
                <td><button class="btn btn-warning">Not Completed</button></td>
                @endif
                <td>
                @if(!$task->isCompleted)
               
                  <a href="/markascompleted/{{$task->id}}" class="btn btn-primary">Mark As Completed</a>
                  @else
                  <a href="/markasnotcompleted/{{$task->id}}" class="btn btn-danger">Mark As Not Completed</a>
                  @endif
                  <a href="/deletetask/{{$task->id}}" class="btn btn-warning">Delete</a>
                  <a href="/updatetask/{{$task->id}}" class="btn btn-success">Update</a>
                </td>
              </tr>
              @endforeach
            


            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>