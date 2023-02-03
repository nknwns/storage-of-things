@extends('layouts.layout')
@section('content')
    <div class="container thing-create">
        <div class="row">
            <div class="offset-3 col-6">
                <div class="card">
                    <div class="card__header">
                        <h2 class="card__title">Перенос вещи #{{ $thing->id }}</h2>
                    </div>
                    <div class="card__body">
                        <form action="/things/{{ $thing->id }}/move" class="thing-create__form form" method="post">
                            @csrf
                            <div class="form__field">
                                <label for="place_id" class="form__label">Место</label>
                                <select name="place_id" id="place_id" class="form__input">
                                    <option value="-1">Оставить вещь без места пребывания</option>
                                    @if($place)
                                    <option selected value="{{ $place->id }}">{{ $place->name }}</option>
                                    @endif
                                    @foreach($places as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form__field">
                                <label for="amount" class="form__label">Количество</label>
                                <input required type="number" name="amount" id="amount" class="form__input">
                            </div>
                            <div class="form__footer">
                                <button type="submit" class="form__button button">Перенести вещь</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
