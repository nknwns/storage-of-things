@extends('layouts.layout')
@section('content')
    <div class="container thing-create">
        <div class="row">
            <div class="offset-3 col-6">
                <div class="card">
                    <div class="card__header">
                        <h2 class="card__title">Добавление вещи в место #{{ $place->id }}</h2>
                    </div>
                    <div class="card__body">
                        <form action="/places/{{ $place->id }}/things" class="thing-create__form form" method="post">
                            @csrf
                            <div class="form__field">
                                <label for="thing_id" class="form__label">Вещь</label>
                                <select name="thing_id" id="thing_id" class="form__input">
                                    @foreach($things as $item)
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
