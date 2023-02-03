@extends('layouts.layout')
@section('content')
    <div class="container thing-create">
        <div class="row">
            <div class="offset-3 col-6">
                <div class="card">
                    <div class="card__header">
                        <h2 class="card__title">Создание вещи</h2>
                    </div>
                    <div class="card__body">
                        <form action="/things" class="thing-create__form form" method="post">
                            @csrf
                            <div class="form__field">
                                <label for="name" class="form__label">Название</label>
                                <input required type="text" name="name" id="name" class="form__input">
                            </div>
                            <div class="form__field">
                                <label for="description" class="form__label">Описание</label>
                                <textarea name="description" id="description" class="form__input form__input--textarea"></textarea>
                            </div>
                            <div class="form__field">
                                <label for="wrst" class="form__label">Срок годности</label>
                                <input required type="date" name="wrst" id="wrst" class="form__input">
                            </div>
                            <div class="form__field">
                                <label for="owner_id" class="form__label">Владелец</label>
                                <select name="owner_id" id="owner_id" class="form__input">
                                    <option selected value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form__footer">
                                <button type="submit" class="form__button button">Создать вещь</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
