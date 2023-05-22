@extends('layouts.admin.admin')
{{-- @endif --}}
@section('main-head')
{{ __('translation.realstate_mangement') }}
<small> - {{ __('translation.edit_real_state') }} </small>
@endsection
@push('links')
<x-head.tinymce-config />
@endpush
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <div class="card-body pt-0">
                    {{-- @include('layouts.includes.session') --}}
                    @include('layouts.includes.session')
                    <form action="{{ route('realstate.update' , $realstate->id)}}" method="post" id='owner_form'
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="border rodunded-sm ">
                            <div class="col-md-12 bg-secondary p-4 rodunded-xl">
                                <span class="text-2xl font-bold ">
                                    {{ __('translation.main_info') }}
                                </span>
                            </div>
                            <div class="row px-3 mt-3">
                                <x:text-input name='name' class='col-md-6' :value='$realstate->name' />
                                <x:select2-input name='unit' class='col-md-6' :value='$realstate->unit_id'
                                    :option='$realstate->Unit' />
                                {{-- @dd($realstate->Unit) --}}
                                <x:text-input name='realstate_number' class='col-md-6'
                                    :value='$realstate->realstate_number' />
                                {{--
                                <x:text-input name='iban_number' class='col-md-6' /> --}}
                                <x:text-input name='floors_number' class='col-md-3'
                                    :value='$realstate->floors_number' />
                                {{-- @dd('sad') --}}
                                <x:text-input name='unit_number' :value='$realstate->unit_number' class='col-md-3' />
                                {{--
                                <x:text-input name='phone' class='col-md-6' /> --}}
                                <div class="mt-2 col-12 row">
                                    {{-- Owners Section --}}
                                    {{-- @dd($realstate->Owner) --}}
                                    <x:select2-input name='owner' class='col-md-4' :value='$realstate->owner_id'
                                        :option='$realstate->Owner' />
                                    {{-- @dd($realstate->Owner); --}}
                                    <x:text-input name='instrument_number' class='col-md-4'
                                        :value='$realstate->instrument_number' />
                                    <x:text-input name='instrument_date' class='col-md-4'
                                        :value='$realstate->instrument_date' />
                                    {{-- Sector Section --}}
                                    <x:select2-input name='spectator' :value='$realstate->spectator_id'
                                        :option='$realstate->Owner' class='col-md-4' />
                                    <x:text-input name='spectator_number' class='col-md-4'
                                        :value='$realstate->spectator_number' />
                                    <x:text-input name='spectator_date' :value='$realstate->spectator_date'
                                        class='col-md-4' />
                                    {{-- Agent --}}
                                    <x:select2-input name='agent' :value='$realstate->agent_id'
                                        :option='$realstate->Agnet' class='col-md-4' />
                                    <x:text-input name='agent_number' :value='$realstate->agent_number'
                                        class='col-md-4' />
                                    <x:text-input name='agent_date' :value='$realstate->agent_date' class='col-md-4' />
                                </div>
                            </div>
                        </div>

                        <div class="border rodunded-sm ">
                            <div class="col-md-12 bg-secondary p-4 rodunded-xl">
                                <span class="text-2xl font-bold ">
                                    {{ __('translation.address') }}
                                </span>
                            </div>
                            <div class="row px-3 mt-3">
                                <div class="form-group mb-2 col-md-6">
                                    <label for="">{{ __('translation.province') }}</label>
                                    <select id='province_select' style='width:100%' class='form-control'
                                        name='province_id'>
                                        <option value='{{ $realstate->province_id }}' selected> {{
                                            $realstate->Province->name ??
                                            __('translation.chose_province')}}
                                        </option>
                                    </select>
                                    @error('province_id')
                                    <span class="text-danger">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-2 col-md-6">
                                    <label for="">{{ __('translation.subarea') }}</label>
                                    <select id='subarea_select' style='width:100%' class='form-control'
                                        name='subarea_id'>
                                        <option value='{{ $realstate->subarea_id }}' selected> {{
                                            $realstate->SubArea->name ??
                                            __('translation.chose_subarea')}}
                                        </option>
                                    </select>
                                    @error('subarea_id')
                                    <span class="text-danger">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                <x:text-input name='address' :value='$realstate->address' class='col-md-6' />
                                <x:text-input name='map_address' :value='$realstate->map_address' class='col-md-6' />
                                <x:text-input name='national_address' :value='$realstate->national_address'
                                    class='col-md-6' />
                            </div>
                            <div class="border rodunded-sm my-2">
                                <div class="col-md-12 bg-secondary p-4 rodunded-xl">
                                    <span class="text-2xl font-bold ">
                                        {{ __('translation.service_information') }}
                                    </span>
                                </div>
                                <div class="row m-3">
                                    <x:text-input name='electricity_account_number'
                                        :value='$realstate->electricity_account_number' class='col-md-6' />
                                    <x:text-input name='electricity_service_number'
                                        :value='$realstate->electricity_service_number' class='col-md-6' />
                                    <x:text-input name='water_account_number' :value='$realstate->water_account_number'
                                        class='col-md-6' />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <x-forms.tinymce-editor />
                                </div>
                            </div>

                        </div>

                        <div class="mt-4">
                            <button class="btn btn-primary" id='submit_button'>
                                {{ __('translation.save') }}
                            </button>
                            <a href='{{ route("owners.index" )}}' class="btn btn-outline-danger">
                                {{ __('translation.cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <!--end::Card body-->
        </div>
    </div>
    <!--end::Container-->
</div>

@endsection
@push('scripts')
<script src='https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js'></script>
<script>
    // Wait for the DOM to be ready
     $(function() {
          // Initialize form validation on the registration form.
          // It has the name attribute "registration"
          $("#owner_form").validate({
               // Specify validation rules
               rules: {
                    name: "required",
                    unit_id: "required",
                    phone: "required",
                    unit_number:'required',
                    realstate_number:'required',
                    floors_number:'required',
                    instrument_number:'required',
                    owner_id:'required',
                    instrument_date:'required',
                    instrument_number:'required',
                    map_address:'required',
                    national_address:'required',
                    water_account_number:'required',
                    electricity_service_number:'required',
                    electricity_account_number:'required',
                    province_id: "required",
                    subarea_id: "required",
                    address:'required',
               },
               // Specify validation error messages
               messages: {
                    name:"{{ __('translation.valid.required') }}",
                    unit_id:"{{ __('translation.valid.required') }}",
                    phone:"{{ __('translation.valid.required') }}",
                    unit_number:"{{ __('translation.valid.required') }}",
                    realstate_number:"{{ __('translation.valid.required') }}",
                    floors_number:"{{ __('translation.valid.required') }}",
                    instrument_number:"{{ __('translation.valid.required') }}",
                    owner_id:"{{ __('translation.valid.required') }}",
                    instrument_date:"{{ __('translation.valid.required') }}",
                    instrument_number:"{{ __('translation.valid.required') }}",
                    map_address:"{{ __('translation.valid.required') }}",
                    national_address:"{{ __('translation.valid.required') }}",
                    water_account_number:"{{ __('translation.valid.required') }}",
                    electricity_service_number:"{{ __('translation.valid.required') }}",
                    electricity_account_number:"{{ __('translation.valid.required') }}",
                    province_id:"{{ __('translation.valid.required') }}",
                    subarea_id:"{{ __('translation.valid.required') }}",
                    address:"{{ __('translation.valid.required') }}",
                },
                    submitHandler: function(form) {
                            form.submit();
                    }
          });
     });
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    let province_id = 0;
    // function ChangeSelect (){
    //     alert("hello");
    // }
                    // $("#province_select").change(() => {
                    //     console.log( $(this).val());
                    //     province_id= $(this).val();
                    // })
                    $("#unit_select").select2({
                          ajax: {
                              url: "{{ route('units.ajax') }}"
                              , type: "get"
                              , dataType: 'json'
                              , delay: 250
                              , data: function(params) {
                                   let term = {
                                        search: params.term
                                   , };
                                   console.log(term, params);
                                   return term;
                              }
                              , processResults: function(response) {
                                   console.log(response);
                                   return {
                                        results: response
                                   };
                              }
                              , cache: true
                         }

                    });


                     $("#owner_select ,#spectator_select, #agent_select ").select2({
                          ajax: {
                              url: "{{ route('owners.ajax') }}"
                              , type: "get"
                              , dataType: 'json'
                              , delay: 250
                              , data: function(params) {
                                   let term = {
                                        search: params.term
                                   , };
                                   console.log(term, params);
                                   return term;
                              }
                              , processResults: function(response) {
                                   console.log(response);
                                   return {
                                        results: response
                                   };
                              }
                              , cache: true
                         }

                    });


                    $("#province_select").select2({
                        //  dropdownParent: $('#kt_modal_add_customer')
                          ajax: {
                              url: "{{ route('province.ajax') }}"
                              , type: "get"
                              , dataType: 'json'
                              , delay: 250
                              , data: function(params) {
                                   let term = {
                                        search: params.term,
                                    };
                                   console.log(term, params);
                                   return term;
                              }
                              , processResults: function(response) {
                                   console.log(response);
                                   return {
                                        results: response
                                   };
                              }
                              , cache: true
                         }
                    });

                    $("#subarea_select").select2({
                        //  dropdownParent: $('#kt_modal_add_customer')
                         ajax: {
                              url: "{{ route('subarea.ajax') }}"
                              , type: "get"
                              , dataType: 'json'
                              , delay: 250
                              , data: function(params) {
                                   let term = {
                                        search: params.term,
                                        province_id:$('#province_select').val()     // area_id: area_id
                                    };
                                   console.log(term, params);
                                   return term;
                              }
                              , processResults: function(response) {
                                   console.log(response);
                                   return {
                                        results: response
                                   };
                              }
                              , cache: true
                         }
                    });
</script>
@endpush