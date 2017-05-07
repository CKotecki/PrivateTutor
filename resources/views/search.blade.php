@extends('layouts.layout')
@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a.header {
  background-color: #e2e2e2;
  cursor: default;
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>

{{-- <script>
function TutorForm(){
  document.getElementsByName("addTutorForm").submit();
}
</script> --}}

<body>
  <h2>Tutors</h2>

{{-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"> --}}

{{-- populate a list of tutors --}}
<ul id="myUL">

  @foreach ($tutors as $i=>$tutor)
    {{-- Check if the student is already subscribed to the tutor and do not add if so and check if it is the user--}}
    @if($tutor->id != Auth::user()->id)
      @if($i < sizeof($coupled))
        @if($tutor->id != $coupled[$i]->id)
          <li><a data-toggle="modal" data-target="#myModal" id={{$tutor->name}} data-name="{{$tutor->name}}" data-id="{{$tutor->id}}">{{$tutor->name}}</a></li>
        @endif
      @else
        <li><a data-toggle="modal" data-target="#myModal" id={{$tutor->name}} data-name="{{$tutor->name}}" data-id="{{$tutor->id}}">{{$tutor->name}}</a></li>
      @endif

  @endif
  @endforeach
</ul>

{{-- modal for tutor --}}
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">




  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
          <form action="#" method="POST">
            {{ csrf_field() }}
            <input type="hidden" type="text" name="tutorID" class="tutor-id" value = "">
            <input type="hidden" type="text" name="studentID" id="task-user" value = {{Auth::user()->id}}>

            </div>
            <div class="modal-body">
              <p>Tutor Info</p>
            </div>
            <div class="col-sm-offset-3 col-sm-6">
          <button class="btn btn-default">
              <i class="fa fa-plus"></i> Add Tutor
          </button>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>

    </div>

</div>
</body>



<script>

$('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('name') // Extract info from data-* attributes
  var idval = button.data('id')
  console.log(idval)
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.tutor-id').val(idval)

})

function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }
}
</script>




@endsection
