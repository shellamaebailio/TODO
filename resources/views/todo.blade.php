@extends('layout')

@section('content')

{{--new form start--}}

    <br/>
        <div class="container shella-container">

          <div class="row">

            <div class="col-sm-4" >
            
                <my-button></my-button>

                <ul class="list-group mb-3">
                @foreach($category as $c)

                    <a href="/todo/{{$c->id}}">
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            {{$c->category}}
                         <span class="badge badge-secondary badge-pill">0</span>
                        </li>
                    </a>

                 @endforeach
                </ul>

                <form action="post_category" method="POST">

                    <div class="input-group mb-3">
                      <input type="text" name="category" class="form-control" placeholder="Add new category" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-secondary" type="button">Save</button>
                      </div>
                    </div>
                    @csrf
                </form>

            </div>

            <div class="col-sm-8">

                <div class="funkyradio">
                    <h5>To-Do</h5>
                    @foreach($unchecked as $td)
                        <div class="funkyradio-default">
                            <input type="checkbox" name="checkbox" id="{{$td->id}}"/>
                            <label class="strikethrough" for="{{$td->id}}">{{ $td->description }} <span>{{ $td->category->category }}</span> </label>
                        </div>
                    @endforeach
                    <hr/>

                    <h5>Completed To-Do</h5>
                     @foreach($checked as $td)
                        <div class="funkyradio-default">
                            <input type="checkbox" name="checkbox" id="{{$td->id}}" checked/>
                            <label class="strikethrough" for="{{$td->id}}">{{ $td->description }}</label>
                        </div>
                     @endforeach
                </div>

                <form action="todo_post" method="POST">

                    <div class="input-group mb-3">
                      <input type="text" name="description" class="form-control" placeholder="Add new todo" aria-label="Recipient's username" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button class="btn btn-secondary" type="button">Save</button>
                      </div>
                      <div>{{ $errors->first('description') }}</div>
                    </div>
                    @csrf
                </form>
            </div>

          </div>

        </div>

{{--end new form--}}


    <div class="funkyradio">
        <br/>
        <h5>To-Do</h5>
        @foreach($unchecked as $td)
            <div class="funkyradio-default">
                <input type="checkbox" name="checkbox" id="{{$td->id}}"/>
                <label class="strikethrough" for="{{$td->id}}">{{ $td->description }} <span>{{ $td->category->category }}</span> </label>
            </div>
        @endforeach
        <hr/>
        <test-vue></test-vue>
        <h5>Completed To-Do</h5>
         @foreach($checked as $td)
            <div class="funkyradio-default">
                <input type="checkbox" name="checkbox" id="{{$td->id}}" checked/>
                <label class="strikethrough" for="{{$td->id}}">{{ $td->description }}</label>
            </div>
         @endforeach

    </div>
        <hr/>

        <form action="todo_post" method="POST">
            <span>Add new </span>
            <input type="text" name="description" class="form-control"/>
            <div>{{ $errors->first('description') }}</div>
            <br/>
            <button type="submit" class="btn btn-secondary">Save new list</button>
         @csrf
        </form>

@endsection


