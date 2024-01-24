@extends('backend.layout.master')

@section('title', 'Pages Update')

@section('content')

    @if (session('error'))
        <div class="text-danger text-center">{{ session('error') }}</div>
    @endif
    @if (session('success'))
        <div class="text-danger text-center">{{ session('success') }}</div>
    @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pages</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('backend.pages.index') }}">Pages</a></li>
                        <li class="breadcrumb-item active">Update</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 card">
                    <div class="card-header">
                        <h3 class="card-title">Update Pages</h3>

                    </div>

                    <div>
                        <form role="form" action="{{ route('backend.pages.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ old('title')?old('title'):$page->title }}">
                                    @if($errors->first('title'))
                                        <span style="color: red">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" placeholder="Enter description" name="description">
                                        {{ old('description')?old('description'):$page->description }}
                                    </textarea>
                                    @if($errors->first('description'))
                                        <span style="color: red">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="photo">Image</label>
                                    <input type="file" class="form-control mb-2" id="image" placeholder="Enter image" name="image">
                                    @if ($page->image != '')
                                        <a class="mb-2" href="{{ asset("uploads/pages/".$page->image) }}" target="_blank"><img class="mb-2"  src="{{ asset("uploads/pages/".$page->image) }}" width="300px"></a>
                                    @endif
                                    @if($errors->first('image'))
                                        <span style="color: red">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="isadmin">Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option selected value="">Select Status</option>
                                        <option value="2" {{ old('status') == 2|| $page->status == 2?'selected':'' }}>Inactive</option>
                                        <option value="1" {{ old('status') == 1 || $page->status == 1?'selected':'' }}>Active</option>
                                    </select>
                                    @if($errors->first('status'))
                                        <span style="color: red">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>


                    </div>
                </div>


            </div>


        </div>
    </section>
    <!-- /.content -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        /* tinymce.init({
            selector: 'textarea#description',
            plugins: 'code',
            //toolbar: 'code',
            //menubar: 'tools'
        });

        // Prevent Bootstrap dialog from blocking focusin
$(document).on('focusin', function(e) {
  if ($(e.target).closest(".tox-tinymce, .tox-tinymce-aux, .moxman-window, .tam-assetmanager-root").length) {
    e.stopImmediatePropagation();
  }
}); */
const tinyBaseConfig = {
        selector: 'textarea#description',
        width: "100%",
        height: 500,
        resize: false,
        autosave_ask_before_unload: false,
        powerpaste_allow_local_images: true,
        plugins: [
            'a11ychecker', 'advcode', 'advlist', 'anchor', 'autolink', 'code', 'codesample', 'fullscreen', 'help',
            'image', 'editimage', 'tinydrive', 'lists', 'link', 'media', 'powerpaste', 'preview',
            'searchreplace', 'table', 'template', 'tinymcespellchecker', 'visualblocks', 'wordcount'
        ],
        /* templates: [
            {
            title: 'Non-editable Example',
            description: 'Non-editable example.',
            content: table
            },
            {
            title: 'Simple Table Example',
            description: 'Simple Table example.',
            content: table2
            }
        ], */
        toolbar: 'insertfile a11ycheck undo redo | bold italic | forecolor backcolor |  alignleft aligncenter alignright alignjustify | bullist numlist | link image', //template codesample |
        spellchecker_dialog: true,
        spellchecker_ignore_list: ['Ephox', 'Moxiecode'],
        tinydrive_demo_files_url: '../_images/tiny-drive-demo/demo_files.json',
        tinydrive_token_provider: (success, failure) => {
            success({ token: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJqb2huZG9lIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.Ks_BdfH4CWilyzLNk8S2gDARFhuxIauLa8PwhdEQhEo' });
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    };

    tinymce.init(tinyBaseConfig);
    </script>
@endsection
