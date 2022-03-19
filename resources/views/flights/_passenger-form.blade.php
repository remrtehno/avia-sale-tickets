<input-spinner :max-passengers="{{ $flights->countChairs() }}" :adults-count="{{ old('adults_count', 1) }}"
  :children-count="{{ old('children_count', 0) }}" :infants-count="{{ old('infants_count', 0) }}">
</input-spinner>
