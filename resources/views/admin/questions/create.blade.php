@extends('layouts.master')


@push('css')

    <style>
        #questions>input {
            display: none;
        }

        #answer1>input {
            display: none;
        }




    </style>

@endpush

@section('content')
    @include('communUi.breadcrumb')
    @include('communUi.flash')

    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Ajouter la question et les réponses</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('questions.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><strong>Ajouter la question</strong></h5>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col col-3 form-group">
                                        <label>Le titre <span class="text-danger">*</span></label>
                                        <input name="title" id="title" type="text" class="form-control input-default " placeholder="Entrez le titre de la question" required>
                                    </div>
                                    <div class="col col-3 form-group">
                                        <label>L'EMD <span class="text-danger">*</span></label>
                                        <select id="select_emd" name="emd" >
                                            <option></option>
                                            <option value="EMD 1">EMD 1</option>
                                            <option value="EMD 2">EMD 2</option>
                                            <option value="EMD 3">EMD 3</option>
                                        </select>
                                    </div>
                                    <div class="col col-2 form-group">
                                        <label>L'année<span class="text-danger">*</span></label>
                                        <input name="year" id="year" type="number" class="form-control input-default " placeholder="2024" required>
                                    </div>
                                    <div class="col col-2 form-group">
                                        <label>Ratt <span class="text-danger">*</span></label>
                                        <select id="select_ratt" name="ratt" >
                                            <option></option>
                                            <option value="1" >OUI</option>
                                            <option value="0" selected>NON</option>
                                        </select>
                                    </div>
                                    <div class="col col-2 form-group">
                                        <label>Images</label>
                                        <div></div>
                                        <label>
                                            <img width="30%" src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png"/>
                                            <input type="file" name="images_question[]" style="display:none" multiple>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">

                                    @if(isset($course))
                                        <input type="hidden" name="course_id" value="{{$course->id}}">
                                    @else
                                        <div class="col col-md-12 form-group">
                                            <label>Le cours <span class="text-danger">*</span></label>
                                            <select id="select_course" name="course_id" >
                                                <option></option>
                                                @foreach($courses as $course)
                                                    <option value="{{$course->id}}">{{$course->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                </div>


                            </div>
                            <div class="modal-header">
                                <h5 class="modal-title"><strong>Ajouter les réponses</strong></h5>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label>Réponse 1 <span class="text-danger">*</span></label>
                                        <input name="response[]" id="response" type="text" class="form-control form-control" placeholder="entrez la réponse" required>
                                    </div>
                                    <div class="col-1 form-group">
                                        <br><br>
                                        <input type="checkbox" class="form-check-input" id="check1" value="0" name="is_correct[]">

                                    </div>
                                    <div class="col-4 form-group">
                                        <label>Image 1</label>
                                        <div></div>
                                        <label>
                                            <img width="30%" src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png"/>
                                            <input type="file" name="image_answer[]" style="display:none">
                                        </label>


                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label>Réponse 2 <span class="text-danger">*</span></label>
                                        <input name="response[]" id="response" type="text" class="form-control form-control" placeholder="entrez la réponse" required>
                                    </div>
                                    <div class="col-1 form-group">
                                        <br><br>
                                        <input type="checkbox" class="form-check-input" id="check2" value="1" name="is_correct[]">

                                    </div>
                                    <div class="col-4 form-group">
                                        <label>Image 2</label>
                                        <div></div>
                                        <label>
                                            <img width="30%" src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png"/>
                                            <input type="file" name="image_answer[]" style="display:none">
                                        </label>
                                    </div>
                               </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label>Réponse 3<span class="text-danger">*</span></label>
                                        <input name="response[]" id="response" type="text" class="form-control form-control" placeholder="entrez la réponse" required>
                                    </div>
                                    <div class="col-1 form-group">
                                        <br><br>
                                        <input type="checkbox" class="form-check-input" id="check3" value="2" name="is_correct[]">

                                    </div>
                                    <div class="col-4 form-group">
                                        <label>Image 3</label>
                                        <div></div>
                                        <label>
                                            <img width="30%" src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png"/>
                                            <input type="file" name="image_answer[]" style="display:none">
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label>Réponse 4 <span class="text-danger">*</span></label>
                                        <input name="response[]" id="response" type="text" class="form-control form-control" placeholder="entrez la réponse" required>
                                    </div>
                                    <div class="col-1 form-group">
                                        <br><br>
                                        <input type="checkbox" class="form-check-input" id="check4" value="3" name="is_correct[]">
                                    </div>
                                    <div class="col-4 form-group">
                                        <label>Image 4</label>
                                        <div></div>
                                        <label>
                                            <img width="30%" src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png"/>
                                            <input type="file" name="image_answer[]" style="display:none">
                                        </label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6 form-group">
                                        <label>Réponse 5 <span class="text-danger">*</span></label>
                                        <input name="response[]" id="response" type="text" class="form-control form-control" placeholder="entrez la réponse" required>
                                    </div>
                                    <div class="col-1 form-group">
                                        <br><br>
                                        <input type="checkbox" class="form-check-input" id="check5" value="4" name="is_correct[]">

                                    </div>
                                    <div class="col-4 form-group">
                                        <label>Image 5</label>
                                        <div></div>
                                         <label>
                                            <img width="30%" src="https://icons.iconarchive.com/icons/dtafalonso/android-lollipop/128/Downloads-icon.png"/>
                                            <input type="file" name="image_answer[]" style="display:none">
                                        </label>
                                    </div>
                                </div>

                               {{-- <input type="hidden" name="question_id" value="{{$question->id}}">--}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </div>
                    </form>
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
