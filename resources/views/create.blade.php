@extends('layouts.app')

@section('content')

    <section class="mt-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="text-center">
                        <p class="text-primary text-uppercase fw-bold">Laravel Ajax</p>
                        <h2>Create Book</h2>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="shadow rounded p-5 bg-white">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="contact-form">
                                    <form action="" name="createBook" id="createBook" method="post">
                                        @csrf
                                        <div class="form-group mb-4 pb-2">
                                            <label for="title" class="form-label">Title</label>
                                            <input value="{{ old('title') }}" name="title" type="text" class="form-control shadow-none" id="title">
                                            <p></p>
                                        </div>
                                        <div class="form-group mb-4 pb-2">
                                            <label for="author" class="form-label">Author</label>
                                            <input value="{{ old('author') }}" name="author" type="text" class="form-control shadow-none" id="author">
                                            <p></p>
                                        </div>
                                        <div class="form-group mb-4 pb-2">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea name="description" class="form-control shadow-none " id="description" rows="3">{{ old('description') }}</textarea>
                                            <p></p>
                                        </div>
                                        <div class="form-group mb-4 pb-2">
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" class="form-control shadow-none" id="status">
                                                <option value="1">Active</option>    
                                                <option value="0">Block</option>    
                                            </select>
                                        </div>
                                        <button class="btn btn-primary w-100" type="submit">Create</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        $("#createBook").submit(function (e) { 
            e.preventDefault();
            
            $.ajax({
                type: "POST",
                url: '{{ route("form.store") }}',
                data: $("#createBook").serializeArray(),
                dataType: "json",
                headers : {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}',
                },
                success: function (response) {
                    if(response.status == true){
                        $("#title").removeClass('is-invalid').siblings('p').removeClass("invalid-feedback").html("");
                        $("#author").removeClass("is-invalid").siblings('p').removeClass("invalid-feedback").html("");
                        $("#description").removeClass("is-invalid").siblings('p').removeClass("invalid-feedback").html("");
                        window.location.href = "{{ route('home') }}";
                    }else{
                        var errors = response.errors;
                        if(errors.title){
                            $("#title").addClass("is-invalid").siblings('p').addClass("invalid-feedback").html(errors.title);
                        }else{
                            $("#title").removeClass('is-invalid').siblings('p').removeClass("invalid-feedback").html("");
                        }

                        if(errors.author){
                            $("#author").addClass("is-invalid").siblings('p').addClass("invalid-feedback").html(errors.author);
                        }else{
                            $("#author").removeClass('is-invalid').siblings('p').removeClass("invalid-feedback").html("");
                        }

                        if(errors.description){
                            $("#description").addClass("is-invalid").siblings('p').addClass("invalid-feedback").html(errors.description);
                        }else{
                            $("#description").removeClass('is-invalid').siblings('p').removeClass("invalid-feedback").html("");
                        }

                    }
                }
            });

        });
    </script>
@endsection