@foreach ($cities as $city)
  <option value ="{{ $city->cityid }}">{{ $city->city }}</option>
@endforeach