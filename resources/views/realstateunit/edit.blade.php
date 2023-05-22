{{-- @if (!) --}}
{{-- @dd('jksa');
@extends('layouts.admin.admin')
@else --}}
@extends(auth()->guard('admin')->check() ?'layouts.admin.admin':'layouts.agents.agent_layouts')
{{-- @endif --}}
@section('main-head')
{{ __('translation.owner_mangemnt') }}
<small> - {{ __('translation.create_owner') }} </small>
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
                         <form action="{{ route('realstate.unit.update',$realstateUnit->id)}}" method="post" id='owner_form' enctype="multipart/form-data">
                              @csrf
                              @method('put')
                              <div class="border rodunded-sm ">
                                   <div class="col-md-12 bg-secondary p-4 rodunded-xl">
                                        <span class="text-2xl font-bold ">
                                             {{ __('translation.unit_info') }}
                                        </span>
                                   </div>
                                   <div class="row px-3 mt-3">
                                        @php
                                        $options = ['commercial', 'residential'];
                                        @endphp
                                        <x:text-input name='name' class='col-md-6' :value='$realstateUnit->name' />
                                        <x:text-input name='realstate_id' class='col-md-6' :value='$realstateUnit->realstate_id' />
                                        <x:select-options name='activity_type' class='col-md-6' :options="$options" />
                                        {{-- dd($realstateUnit->Unit->name) --}}
                                        <x:select2-input name='unit' class='col-md-6' :option='$realstateUnit->Unit' :value='$realstateUnit->unit_id' />
                                        <x:text-input name='halls_number' :value='$realstateUnit->halls_number' class='col-md-6' />
                                        <x:text-input name='room_number' :value='$realstateUnit->room_number' class='col-md-6' />
                                        <x:text-input name='bathroom_number' :value='$realstateUnit->bathroom_number' class='col-md-6' />
                                        <x:text-input name='external_doors_number' :value='$realstateUnit->external_doors_number' class='col-md-6' />
                                        {{-- <x:select-options :options='$floors' name='floor_number' class='col-md-6' /> --}}
                                        <div class="form-group col-md-6">
                                             <label for="">{{ __('translation.floor_number') }}</label>
                                             <select class="form-control" name="floor_number" id="">
                                                  <option value="{{ $realstateUnit->floor_number }}" selected>{{ __('translation.' . $realstateUnit->floor_number . '_floor' ) }}</option>
                                                  @for($i = 1; $i <= 10; $i++) <option value='{{ $i }}'>{{ __('translation.' . $i . '_floor' ) }}
                                                       </option>
                                                       @endfor
                                             </select>
                                        </div>
                                        <x:text-input name='space' :value='$realstateUnit->space' class='col-md-6' />
                                        <x:text-input name='virtual_value' :value='$realstateUnit->virtual_value' class='col-md-6' />
                                   </div>

                              </div>
                              <div class="border rodunded-sm mt-10 ">
                                   <div class="col-md-12 bg-secondary p-4 rodunded-xl">
                                        <span class="text-2xl font-bold ">
                                             {{ __('translation.service_information') }}
                                        </span>
                                   </div>
                                   <div class="row px-3 mt-3">
                                        <x:text-input name='electricity_account_number' :value='$realstateUnit->electricity_account_number' class='col-md-6' />
                                        <x:text-input name='water_account_number' :value='$realstateUnit->water_account_number' class='col-md-6' />
                                   </div>
                              </div>
                              <div class="mt-4">
                                   <button class="btn btn-primary" id='submit_button'>
                                        {{ __('translation.save') }}
                                   </button>
                                   <a href='#' onclick="window.history.back()" class="btn btn-outline-danger">
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
                    name: "required"
                    , unit_id: "required"
                    , activity_type: "required"
                    , bathroom_number: "required"
                    , room_number: "required"
                    , halls_number: "required"
                    , virtual_value: "required"
                    , external_doors_number: "required"
                    , floor_number: "required"
                    , space: "required"
                    , water_account_number: "required"
                    , electricity_account_number: "required"

               },
               // Specify validation error messages
               messages: {
                    name: "{{ __('translation.valid.required') }}"
                    , id_number: "{{ __('translation.valid.required') }}"
                    , phone: "{{ __('translation.valid.required') }}"
                    , name: "{{ __('translation.valid.required') }}"
                    , unit_id: "{{ __('translation.valid.required') }}"
                    , activity_type: "{{ __('translation.valid.required') }}"
                    , bathroom_number: "{{ __('translation.valid.required') }}"
                    , room_number: "{{ __('translation.valid.required') }}"
                    , halls_number: "{{ __('translation.valid.required') }}"
                    , virtual_value: "{{ __('translation.valid.required') }}"
                    , external_doors_number: "{{ __('translation.valid.required') }}"
                    , floor_number: "{{ __('translation.valid.required') }}"
                    , space: "{{ __('translation.valid.required') }}"
                    , water_account_number: "{{ __('translation.valid.required') }}"
                    , electricity_account_number: "{{ __('translation.valid.required') }}"
                    , email: "{{ __('translation.valid.email') }}"
                    , required: "{{ __('translation.valid.required') }}"
               },
               // Make sure the form is submitted to the destination defined
               // in the "action" attribute of the form when valid
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


     $("#province_select").select2({
          //  dropdownParent: $('#kt_modal_add_customer')
          ajax: {
               url: "{{ route('province.ajax') }}"
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

     $("#subarea_select").select2({
          //  dropdownParent: $('#kt_modal_add_customer')
          ajax: {
               url: "{{ route('subarea.ajax') }}"
               , type: "get"
               , dataType: 'json'
               , delay: 250
               , data: function(params) {
                    let term = {
                         search: params.term
                         , province_id: $('#province_select').val() // area_id: area_id
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
