@extends('layouts.layout')
@section('content')
    <div class="container thing-create">
        <div class="row">
            <div class="offset-3 col-6">
                <div class="card">
                    <div class="card__header">
                        <h2 class="card__title">Редактирование места #{{ $place->id }}</h2>
                    </div>
                    <div class="card__body">
                        <form action="/places/{{ $place->id }}" class="thing-create__form form" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form__field">
                                <label for="name" class="form__label">Название</label>
                                <input required type="text" name="name" id="name" class="form__input" value="{{ $place->name }}">
                            </div>
                            <div class="form__field">
                                <label for="description" class="form__label">Описание</label>
                                <textarea name="description" id="description" class="form__input form__input--textarea">{{ $place->description }}</textarea>
                            </div>
                            <div class="form__field">
                                <label for="status" class="form__label">Статус места</label>
                                <select name="status" id="status" class="form__input">
                                    @if($place->work)
                                        <option value="idle">В ожидании</option>
                                        <option value="repairing">Ремонт/мойка</option>
                                        <option selected value="working">В работе</option>
                                    @elseif($place->repair)
                                        <option value="idle">В ожидании</option>
                                        <option selected value="repairing">Ремонт/мойка</option>
                                        <option value="working">В работе</option>
                                    @else
                                        <option selected value="idle">В ожидании</option>
                                        <option value="repairing">Ремонт/мойка</option>
                                        <option value="working">В работе</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form__field">
                                <label for="author_id" class="form__label">Владелец</label>
                                <select name="author_id" id="author_id" class="form__input">
                                    <option selected
                                            value="{{ $place->author_id }}">{{ $place->getAuthor()->name }}</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form__footer">
                                <button type="submit" class="form__button button">Обновить данные</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
