
    <div class="container">
        <h3>Add todo using laravel livewire </h3>
        <div class="form-group">
           Search <input class="form-control-sm" wire:model.live="search" type="text" value="Search">
        </div>

            @if (session('success'))
            <div class="alert">{{session('success')}}</div>
            @endif


        @if(!empty($newid))

        <form class="form" wire:submit="updateTodo" action="">
        <input class="form-control-sm" wire:model="newtitle" type="text" value="{{$newtitle}}" required>
        <input class="form-control-sm" wire:model="newdesc" type="text" value="{{$newdesc}}" required>
        <input class="form-control-sm" wire:model="newid" type="hidden" value="{{$newid}}">

        <button class="btn btn-info btn-md" type="submit" >Update Todo</button>

        </form>
        @endif
        <form class="form" wire:submit="addTodo" action="">

            <div class="form-group">
                <label class="form-label" for="title">Title</label>
                <input class="form-control-sm" wire:model="title" type="text" required>
                    @error('title')
                        <div class="alert"> {{$message}}</div>
                    @enderror

            </div>
            <div class="form-group">
                <label class="form-label" for="des">Description</label>
                <input class="form-control-sm" wire:model="desc" type="text" required>
                    @error('desc')
                    <div class="alert"> {{$message}}</div>
                    @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-md" type="submit" >Add Todo</button>
            </div>


        </form>




        <h3>Todo list</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                <tr>
                    <td>{{$row->title}}</td>
                    <td>{{$row->description}}</td>
                    <td><button wire:click="deleteTodo({{$row->id}})">delete</button>|<button wire:click="editTodo({{$row->id}})">edit</button></td>
                </tr>
                @endforeach

            </tbody>
            {{$data->links()}}
        </table>
    </div>





