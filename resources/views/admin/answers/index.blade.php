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
                          {{--  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add_answer">+ Ajouter une réponse</a>
                            @include('admin.answers.models.create')--}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>La réponse</th>
                                        <th>La Question</th>
                                        <th>Est correct</th>
                                        <th>Date de création</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($answers as $answer)
                                        <tr class="btn-reveal-trigger">
                                            <td class="py-2">{{$answer->id}}</td>
                                            <td><span class="badge badge-rounded badge-primary">{{$answer->question->title}}</span></td>
                                            <td class="py-2">{{$answer->response}}</td>
                                            <td class="py-2"><span class="badge badge-rounded @if($answer->is_correct==1) badge-success @else badge-danger @endif ">{{$answer->is_correct ? 'OUI':'NON'}}</span></td>
                                            <td class="py-2">{{$answer->created_at}}</td>
                                            <td>
                                                <a  class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#edit_answer{{$answer->id}}"><i class="la la-pencil"></i></a>
                                                @include('admin.answers.models.edit')
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_answer{{$answer->id}}"><i class="la la-trash-o"></i></a>
                                                @include('admin.answers.models.delete')
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


        })(jQuery);
    </script>

@endpush


