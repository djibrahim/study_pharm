@extends('layouts.master')

@push('css')
@endpush

@section('content')
    @include('communUi.breadcrumb')
    @include('communUi.flash')

    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{$name_page}}  </h4>
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_course">+ Ajouter un cours</a>
                            @include('admin.courses.models.create')
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Le module</th>
                                        <th>Le nom</th>
                                        <th>Date de création</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($courses as $course)
                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">{{$course->id}}</td>
                                            <td><span class="badge badge-rounded badge-primary">{{$course->module->name}}</span></td>
                                            <td class="py-2">{{$course->title}}</td>
                                            <td class="py-2">{{$course->created_at}}</td>
                                            <td>
                                                <a  class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#edit_course{{$course->id}}"><i class="la la-pencil"></i></a>
                                                @include('admin.courses.models.edit')
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_course{{$course->id}}"><i class="la la-trash-o"></i></a>
                                                @include('admin.courses.models.delete')
                                                <a href="{{route('questions.questions_by_course',$course->id)}}" class="btn btn-sm btn-warning" ><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/></svg></a>

                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection



@push('js')
    <script>
        (function($) {
            "use strict"

            $("#select_module").select2({
                placeholder: "Sélectionnez le nom du module",
            });


        })(jQuery);
    </script>

@endpush


