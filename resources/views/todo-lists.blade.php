<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
  </head>
  <body class="bg-info">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('todo-lists') }}">Todo List</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('password') }}">Change Password</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container w-50 mt-5"> 
        <div class="card shadow-sm"> 
            <div class="card-body">
              <h3>Todo List</h3>
              <form action="{{ route('store') }}" method="POST" autocomplete="off">
                @csrf
                <div class="input-group">
                    <input type="text" name="content" class="form-control" placeholder="Add your new todo">
                    <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fas fa-plus"></i></button>
                </div>
              </form> 
              @if (count($todolists))
              <ul class="list-group list-group-flush mt-3">
                  @foreach ($todolists as $todolist)
                      <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            {{$todolist->content}}
                          </div>
                          <div>
                            <button type="button" class="btn btn-link btn-sm" data-mdb-toggle="modal" data-mdb-target="#editModal{{$todolist->id}}"><i class="fas fa-edit"></i></button>
                            <form action="{{ route('destroy', $todolist->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-link btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                          </div>
                        </div>
                      </li>
                      </div>
                      <!-- Modal -->
                      <div class="modal fade" id="editModal{{$todolist->id}}" tabindex="-1" aria-labelledby="editModalLabel{{$todolist->id}}" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editModalLabel{{$todolist->id}}">Edit Todo</h5>
                              <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('update', $todolist->id) }}" method="POST">
                              @csrf
                              @method('PUT')
                              <div class="modal-body">
                                <div class="input-group">
                                  <input type="text" name="content" class="form-control" value="{{$todolist->content}}">
                                  <button type="submit" class="btn btn-primary btn-sm px-4">Save</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                  @endforeach
                  </ul>
                  @else
                  <p class = "text-center mt-3">No Todo List</p>
                  @endif
            </div>
        </div>
    </div>
  </body>
</html>

