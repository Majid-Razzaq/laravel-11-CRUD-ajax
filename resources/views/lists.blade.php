
@extends('layouts.app')
@section('content')
     <div class="container">
         <div class="row ">
             <div class="col-md-8 mx-auto mt-5">
                 @include('layouts.message')
                 <h2>Laravel 11 CRUD with Ajax</h2>
                 
                 <form action="" method="get">
                 <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-lg-2 col-md-3">
                        <a href="{{ route('form.create') }}" class="btn btn-primary w-100">Create</a>
                    </div>
                    <div class="col-lg-6 col-md-7 d-flex">
                            <input type="text" value="{{ Request::get('keyword') }}" class="form-control form-control-lg me-2" name="keyword" placeholder="Search by title">
                            <button class="btn btn-primary btn-lg" style="min-width: 100px;"><i class="fa-solid fa-magnifying-glass"></i> Search</button>                                                                    
                        </form>
                    </div>
                </div>
            </form>
                
                 <table class="table table-striped table-bordered table-hover mt-4">
                     <thead class="table-dark">
                         <th >Title</th>
                         <th >Author</th>
                         <th >Status</th>
                         <th >Actions</th>
                     </thead>
                     <tbody>

                        @if ($books->isNotEmpty())
                        @foreach($books as $book)
                            <tr>
                                <td class="text-dark">{{ $book->title }}</td>
                                <td class="text-dark">{{ $book->author }}</td>
                                <td class="text-center">
                                    @if ($book->status == 1)
                                        <span class="text-primary">Active</span>
                                    @else
                                        <span class="text-danger">Block</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('form.edit',$book->id) }}" class="btn btn-secondary w-20">Edit</a>
                                    <a href="javascript:void(0);" onclick="deleteBook({{ $book->id }})" class="btn btn-danger w-20 m-1">Delete</a>
                                </td>
                            </tr>                                                        
                        @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-dark">Data not found</td>
                            </tr>
                        @endif
                    </tbody>
                 </table>
                 {{ $books->links() }}
             </div>
         </div>
     </div>
@endsection

@section('script')
    <script type="text/javascript">
        function deleteBook(id){
            if(confirm("Are you sure you want to delete?")){

                $.ajax({
                    type: "DELETE",
                    url: "{{ route('form.destroy') }}",
                    data: {id:id},
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        window.location.href = "{{ route('home') }}";
                    }
                });

            }
        }
    </script>
@endsection