<div>
     <a class="btn btn-sm btn-primary fs-10px" href='#' data-bs-toggle="modal" data-bs-target="#kt_modal_{{ $realstate->id }}">
          {{ __('translation.realstate_units') }} ({{ count($realstate->RealStateUnits) }})
     </a>

     <div class="modal fade " tabindex="-1" id="kt_modal_{{ $realstate->id }}">
          <div class="modal-dialog modal-xl">
               <div class="modal-content ">
                    <div class="modal-header">
                         <h5 class="modal-title">{{ __('translation.single_units') }} {{ $realstate->name }}</h5>
                         <!--begin::Close-->
                         <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                              <span class="svg-icon svg-icon-2x"></span>
                         </div>
                         <!--end::Close-->
                    </div>

                    <div class="modal-body">
                         <x:show-unit :realstateunits='$realstate->RealstateUnits' :realstate='$realstate->id' />
                         {{-- <p>Modal body text goes here.</p> --}}
                    </div>

                    <div class="modal-footer">
                         <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('translation.cancel') }}</button>
                    </div>
               </div>
          </div>
     </div>
</div>
