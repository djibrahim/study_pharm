@extends('layouts.master')

@push('css')
@endpush

@section('content')
    @include('communUi.breadcrumb')
    @include('communUi.flash')

    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-pills mb-3">
                <li class="nav-item mx-1" >
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_question">+ Ajouter une question</a>
                </li>
                <li class="nav-item mx-1">
                    @if(isset($course))
                        <a href="{{route('questions.create_by_course',$course->id)}}" class="btn btn-primary" >+ Ajouter une question avec les réponses</a>
                    @else
                        <a href="{{route('questions.create')}}" class="btn btn-primary" >+ Ajouter une question avec les réponses</a>
                    @endif
                    @include('admin.questions.models.create')
                </li>
            </ul>
        </div>
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{$name_page}} </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Le cours</th>
                                        <th>Le Titre</th>
                                        <th>EMD</th>
                                        <th>Date</th>
                                        <th>Rattrapage</th>
                                        <th>Date de création</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($questions as $question)
                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">{{$question->id}}</td>
                                            <td><span class="badge badge-rounded badge-primary">{{$question->course->title}}</span></td>
                                            <td class="py-2">{{$question->title}}</td>
                                            <td class="py-2">{{$question->emd}}</td>
                                            <td class="py-2">{{$question->year}}</td>
                                            <td class="py-2"><span class="badge badge-rounded @if($question->ratt==1) badge-danger @else badge-success @endif ">{{$question->ratt ? 'OUI':'NON'}}</span></td>
                                            <td class="py-2">{{$question->created_at}}</td>
                                            <td>
                                                <a  class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#edit_question{{$question->id}}"><i class="la la-pencil"></i></a>
                                                @include('admin.questions.models.edit')
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_question{{$question->id}}"><i class="la la-trash-o"></i></a>
                                                @include('admin.questions.models.delete')
                                                <a href="#" class="btn btn-sm btn-secondary text-white" data-toggle="modal" data-target="#add_answer{{$question->id}}">+</a>
                                                @include('admin.answers.models.create')
                                                <a href="{{route('answers.index',$question->id)}}" class="btn btn-sm btn-warning" ><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z"/></svg></a>
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

            $("#select_emd").select2({
                placeholder: "Sélectionnez l'EMD'",
            });

            $("#is_correct1").select2({
                placeholder: "Sélectionnez oui si la réponse est juste'",
            });
            $("#is_correct2").select2({
                placeholder: "Sélectionnez oui si la réponse est juste'",
            });
            $("#is_correct3").select2({
                placeholder: "Sélectionnez oui si la réponse est juste'",
            });
            $("#is_correct4").select2({
                placeholder: "Sélectionnez oui si la réponse est juste'",
            });
            $("#is_correct5").select2({
                placeholder: "Sélectionnez oui si la réponse est juste'",
            });

            $("#select_course").select2({
                placeholder: "Sélectionnez le cours",
            });

            $("#select_ratt").select2({
                placeholder: "Si rattrapage Sélectionnez OUI",
            });


        })(jQuery);
    </script>

@endpush


