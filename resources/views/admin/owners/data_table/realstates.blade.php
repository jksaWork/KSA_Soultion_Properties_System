<div>
     <a class="btn btn-sm btn-primary" href='#' data-bs-toggle="modal" data-bs-target="#kt_modal_{{ $owner->id }}">
          {{ __('translation.realstate_units') }} ({{ count($owner->Realstates) }})
     </a>

     <div class="modal fade " tabindex="-1" id="kt_modal_{{ $owner->id }}">
          <div class="modal-dialog modal-xl">
               <div class="modal-content ">
                    <div class="modal-header">
                         <h5 class="modal-title">{{ __('translation.owner_realstate') }} {{ $owner->name }}</h5>
                         <!--begin::Close-->
                         <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                              <span class="svg-icon svg-icon-2x"></span>
                         </div>
                         <!--end::Close-->
                    </div>

                    <div class="modal-body">
                         <x:owner-realstate :realstates='$owner->Realstates' realstate='$realstate->id' />

                         {{-- <p>Modal body text goes here.</p> --}}
                    </div>

                    <div class="modal-footer">
                         <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('translation.cancel') }}</button>
                    </div>
               </div>
          </div>
     </div>
</div>
