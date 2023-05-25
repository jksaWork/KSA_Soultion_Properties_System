<div>
     <div>
          <div class="d-flex justify-content-between">
               <h3 class='p-2'>
                    {{ __('translation.realstate_units') }}
               </h3>
               <div class="btn-group">
                    @if ($type == 'contract')
                    <a class="btn btn-sm btn-primary fs-10px" href='#' data-bs-toggle="modal" data-bs-target="#kt_modal_{{ $realstate->id }}">
                         {{-- {{ __('translation.realstate_units') }} ({{ count($realstate->RealStateUnits) }}) --}}
                         {{ __('translation.add_unit_to_contract') }}
                    </a>

                    <div class="modal fade " tabindex="-1" id="kt_modal_{{ $realstate->id }}">
                         <div class="modal-dialog modal-xl ">
                              <div class="modal-content">
                                   <!--begin::Form-->
                                   <form class="form" action="{{ route('contracts.sync' , $realstate->id) }}" method="post">
                                        @csrf
                                        <!--begin::Modal header-->
                                        <div class="modal-header" id="kt_modal_add_customer_header">
                                             <!--begin::Modal title-->
                                             <h2 class="fw-bolder">{{ __('translation.add_area') }}</h2>
                                             <!--end::Modal title-->
                                             <!--begin::Close-->
                                             <div id="kt_modal_add_customer_close" data-bs-dismiss="modal" aria-label="Close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                                  <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                  <span class="svg-icon svg-icon-1">
                                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                                                       </svg>
                                                  </span>
                                                  <!--end::Svg Icon-->
                                             </div>
                                             <!--end::Close-->
                                        </div>
                                        <!--end::Modal header-->
                                        <!--begin::Modal body-->
                                        <div class="modal-body py-10 px-lg-17">
                                             <!--begin::Scroll-->
                                             <div class="scroll-y me-n7 pe-7 row" id="#">

                                                  <x:text-input name='client' class="col-md-4" :value='$realstate->Client->name' />
                                                  <x:text-input name='realstate' class="col-md-4" :value='$realstate->Realstate->name' />
                                                  <div class="form-group col-md-4 ">
                                                       <label for="">{{ __('translation.realstatee_unit' ) }}</label>
                                                       <select id="realstatee_unit_select" multiple style='width:100%' class='form-control' name='realstatee_unit_id[]'>
                                                            <option>
                                                                 {{ __('realstate.chose_unit') }}
                                                            </option>
                                                       </select>
                                                       @error('realstatee_unit_id')
                                                       <span class="text-danger">
                                                            {{$message}}
                                                       </span>
                                                       @enderror
                                                  </div>
                                             </div>
                                             <!--end::Scroll-->
                                        </div>
                                        <!--end::Modal body-->
                                        <!--begin::Modal footer-->
                                        <div class="modal-footer flex-start items-center">
                                             <!--begin::Button-->
                                             <button type="reset" id="kt_modal_add_customer_cancel" data-bs-dismiss="modal" aria-label="Close" class="btn btn-light me-3">{{ __('translation.cancel') }}</button>
                                             <!--end::Button-->
                                             <!--begin::Button-->
                                             <button class="btn btn-primary"> {{ __('translation.save') }} </button>
                                             <!--end::Button-->
                                        </div>
                                        <!--end::Modal footer-->
                                   </form>
                                   <!--end::Form-->
                              </div>
                              {{-- </form> --}}
                         </div>


                    </div>
               </div>
          </div>

          @else
          <div class="" style='display:inline ;margin:3px'>
               <a href="{{ route('realstate.unit.create' , ['realstate' => $realstate]) }}" class="btn btn-primary btn-sm">
                    {{ __('translation.add_realstate_units') }}
               </a>
          </div>
          @endif
     </div>
</div>
<div class="table-responsive">
     <table class="table align-middle table-row-dashed fs-6 gy-5" id="">
          <thead>
               <tr class=" text-gray-400 fw-bolder fs-7 text-uppercase ">
                    <th class="">{{ __('translation.name') }}</th>
                    <th class="">{{ __('translation.activity_type') }}</th>
                    <th class="">{{ __('translation.unit') }}</th>
                    <th class="">{{ __('translation.floor_number') }}</th>
                    <th class="">{{ __('translation.halls_number') }}</th>
                    <th class="">{{ __('translation.room_number') }}</th>
                    <th class="">{{ __('translation.bathroom_number') }}</th>
                    <th class="">{{ __('translation.external_doors_number') }}</th>
                    <th class="">{{ __('translation.space') }}</th>
                    <th class="">{{ __('translation.virtual_value') }}</th>
                    <th class="">{{ __('translation.electricity_account_number') }}</th>
                    <th class="">{{ __('translation.water_account_number') }}</th>
                    <th class="">{{ __('translation.action') }}</th>
               </tr>
               <!--end::Table row-->
          </thead>
          @forelse ($RealstateUnits as $item)
          <tr>
               <th class="">{{ $item->name }}</th>
               <th class="">{{ __('translation.' . $item->activity_type ) }}</th>
               <th class="">{{ $item->Unit->name  ?? ''}}</th>
               <th class="">{{ $item->FloorNumber() }}</th>
               <th class="">{{ $item->halls_number }}</th>
               <th class="">{{ $item->room_number }}</th>
               <th class="">{{ $item->bathroom_number }}</th>
               <th class="">{{ $item->external_doors_number }}</th>
               <th class="">{{ $item->space }}</th>
               <th class="">{{ $item->virtual_value }}</th>
               <th class="">{{ $item->electricity_account_number }}</th>
               <th class="">{{ $item->water_account_number  }}</th>
               <th class="">
                    <a href="{{ route('realstate.unit.edit' , $item->id) }}" class="btn btn-primary btn-sm btn-icon">
                         <span class="svg-icon svg-icon-3">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                   <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                   <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                              </svg>
                         </span>
                    </a>
               </th>

          </tr>
          @empty
          <tr>
               <td colspan="20" class='text-center'>
                    {{ __('translation.not_found_realstate_unit') }}
               </td>
          </tr>
          @endforelse
          <!--end::Table head-->
          <!--begin::Table body-->
          {{-- <tbody class="fw-bold text-gray-600">
                @forelse ($realState->Revenues->reverse() as $item)
                <tr>

                    <td> {{ $item->name }}</td>
          <td> {{ $item->phone }}</td>
          <td> {{ $item->pivot->month_number }}</td>
          <td> {{ $item->pivot->price }}</td>
          <td>
               @if ($item->pivot->status)
               <span class='badge badge-light-success'>{{
                            __('translation.pay_done') }}
               </span>
               @else
               <span class='badge badge-light-danger'>{{
                            __('translation.pay_undone') }}
               </span>
               @endif
          </td>
          <td> {{ $item->created_at->format('y-m-d') }}</td>
          </tr>
          @empty
          <tr>
               <td collspan='12'>
                    {{ __('translation.no_data_found') }}
               </td>
          </tr>
          @endforelse
          </tbody> --}}
     </table>
</div>
</div>
</div>
