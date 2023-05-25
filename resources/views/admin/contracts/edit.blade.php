{{-- @if (!) --}}
{{-- @dd('jksa');
@extends('layouts.admin.admin')
@else --}}
@extends(auth()->guard('admin')->check() ?'layouts.admin.admin':'layouts.agents.agent_layouts')
{{-- @endif --}}
@section('main-head')
{{ __('translation.contract_mangemnets') }}
<small> - {{ __('translation.edit_contract') }} </small>
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
                         <form action="{{ route('contracts.update' , $contract->id)}}" method="post" id='owner_form' enctype="multipart/form-data">
                              @csrf
                              @method('put')
                              <div class="border rodunded-sm ">
                                   <div class="col-md-12 bg-secondary p-4 rodunded-xl">
                                        <span class="text-2xl font-bold ">
                                             {{ __('translation.contract') }}
                                        </span>
                                   </div>
                                   <div class="row px-3 mt-3">
                                        <x:select2-input name='client' class='col-md-6' :value='$contract->client_id' :option='$contract->Client' />
                                        <x:select2-input name='realstate' class='col-md-6' :value='$contract->realstate_id' :option='$contract->Realstate' />
                                        <x:text-input name='contract_number' class='col-md-6' :value='$contract->contract_number' />
                                        <x:text-input name='end_date' class='col-md-6' :value='$contract->end_date' />
                                        <x:text-input name='start_date' class='col-md-6' :value='$contract->start_date' />
                                        <x:text-input name='contract_date' class='col-md-6' :value='$contract->contract_date' />
                                   </div>

                                   <div class="border rodunded-sm mt-10">
                                        <div class="col-md-12 bg-secondary p-4 rodunded-xl">
                                             <span class="text-2xl font-bold ">
                                                  {{ __('translation.finanical') }}
                                             </span>
                                        </div>
                                        <div class="row p-10">
                                             <x:text-input name='amount' class='col-md-6' :value='$contract->amount' />
                                             <x:select-options name='payment_way' :options='App\Models\Contract::PAYMENTSWAYS' class='col-md-6' />
                                        </div>
                                   </div>
                              </div>
                              <div class="row p-10">

                                   <div class="col-md-12">
                                        <x-forms.tinymce-editor />
                                   </div>
                              </div>
                              <div class="mt-4">
                                   <button class="btn btn-primary" id='submit_button'>
                                        {{ __('translation.save') }}
                                   </button>
                                   <a href='{{ route('owners.index')}}' class="btn btn-outline-danger">
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
                    , phone: "required"
                    , address: "required"
                    , province_id: "required"
                    , subarea_id: "required"
                    , bank_id: "required"
                    , id_number: "required"
                    , iban_number: "required"
                    , email: {
                         required: true
                         , email: true
                    }
                    , password: {
                         required: true
                         , minlength: 5
                    }
               },
               // Specify validation error messages
               messages: {
                    name: "{{ __('translation.valid.required') }}"
                    , id_number: "{{ __('translation.valid.required') }}"
                    , iban_number: "{{ __('translation.valid.required') }}"
                    , bank_id: "{{ __('translation.valid.required') }}"
                    , province_id: "{{ __('translation.valid.required') }}"
                    , subarea_id: "{{ __('translation.valid.required') }}"
                    , address: "{{ __('translation.valid.required') }}"
                    , phone: "{{ __('translation.valid.required') }}",
                    //   lastname: "Please enter your lastname",
                    password: {
                         required: "Please provide a password"
                         , minlength: "Your password must be at least 5 characters long"
                    }
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

     $("#realstate_select").select2({
          ajax: {
               url: "{{ route('realstate.ajax') }}"
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


     $("#client_select").select2({
          //  dropdownParent: $('#kt_modal_add_customer')
          ajax: {
               url: "{{ route('clients.ajax') }}"
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
