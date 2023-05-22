<div class="form-group mb-2 {{ $class }}">
     <label for="">{{ __('translation.' . $name) }}</label>
     <select id='{{ $name ."_select"}}' style='width:100%' class='form-control' name='{{ $name ."_id" }}'>
          <option value='{{ $value ?? '' }}'>
               @if ($option && !is_null($option))
               {{$option->name }}
               @else
               {{ __('translation.chose_' . $name) }}
               @endif
          </option>
     </select>
     @error( $name .'_id')
     <span class="text-danger">
          {{$message}}
     </span>
     @enderror
</div>
