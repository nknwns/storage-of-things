@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content__header">
                    <h2 class="content__title">Вещи</h2>
                    @auth
                        <div class="content__functions">
                            <a href="/things/free" class="content__button content__button--success">
                                Свободные вещи
                            </a>
                            <a href="/things/create" class="content__button">
                                +
                                <span>Создать вещь</span>
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
            @if (!$things->count())
                <div class="empty">
                    <img class="empty__image" src="/img/empty.gif" alt="empty">
                    <p class="empty__message">Список вещей пуст..</p>
                </div>
            @else
                <div class="col-12">
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="col">ID</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Описание</th>
                                    <th scope="col">Дата истечения</th>
                                    <th scope="col">Владелец</th>
                                    <th scope="col">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($things as $thing)
                                <tr class="thing">
                                    <td>{{ $thing->id }}</td>
                                    <td>
                                        <a href="/things/{{ $thing->id }}" class="thing__link thing__name">
                                            <div class="thing__icon">

                                            </div>
                                            <span>{{ $thing->name }}</span>
                                        </a>
                                    </td>
                                    <td>{{ $thing->description ? $thing->description : '-' }}</td>
                                    <td>{{ $thing->wrst }}</td>
                                    <td>
                                        @if ($thing->owner)
                                            <a href="/users/{{ $thing->owner->id }}" class="thing__link">{{ $thing->owner->name }}</a>
                                        @else
                                            <span>-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <svg class="dropdown__button" width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 13C6.55 13 7 12.55 7 12C7 11.45 6.55 11 6 11C5.45 11 5 11.45 5 12C5 12.55 5.45 13 6 13Z" stroke="currentColor" stroke-width="2"/>
                                                <path d="M12 13C12.55 13 13 12.55 13 12C13 11.45 12.55 11 12 11C11.45 11 11 11.45 11 12C11 12.55 11.45 13 12 13Z" stroke="currentColor" stroke-width="2"/>
                                                <path d="M18 13C18.55 13 19 12.55 19 12C19 11.45 18.55 11 18 11C17.45 11 17 11.45 17 12C17 12.55 17.45 13 18 13Z" stroke="currentColor" stroke-width="2"/>
                                            </svg>
                                            <div class="dropdown__menu dropdown__menu--down">
                                                <a class="dropdown__item" href="/things/{{ $thing->id }}">
                                                    <svg width="16px" height="20px" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                                                        <path stroke="currentColor" stroke-width="2" d="M20.188 10.9343C20.5762 11.4056 20.7703 11.6412 20.7703 12C20.7703 12.3588 20.5762 12.5944 20.188 13.0657C18.7679 14.7899 15.6357 18 12 18C8.36427 18 5.23206 14.7899 3.81197 13.0657C3.42381 12.5944 3.22973 12.3588 3.22973 12C3.22973 11.6412 3.42381 11.4056 3.81197 10.9343C5.23206 9.21014 8.36427 6 12 6C15.6357 6 18.7679 9.21014 20.188 10.9343Z"/>
                                                    </svg>
                                                    <span>Просмотреть</span>
                                                </a>
                                                @can('update-thing', $thing)
                                                <a class="dropdown__item" href="/things/{{ $thing->id }}/edit">
                                                    <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M18 9.99982L14 5.99982M2.5 21.4998L5.88437 21.1238C6.29786 21.0778 6.5046 21.0549 6.69785 20.9923C6.86929 20.9368 7.03245 20.8584 7.18289 20.7592C7.35245 20.6474 7.49955 20.5003 7.79373 20.2061L21 6.99982C22.1046 5.89525 22.1046 4.10438 21 2.99981C19.8955 1.89525 18.1046 1.89524 17 2.99981L3.79373 16.2061C3.49955 16.5003 3.35246 16.6474 3.24064 16.8169C3.14143 16.9674 3.06301 17.1305 3.00751 17.302C2.94496 17.4952 2.92198 17.702 2.87604 18.1155L2.5 21.4998Z"/>
                                                    </svg>
                                                    <span>Редактировать</span>
                                                </a>
                                                <a class="dropdown__item" href="/things/{{ $thing->id }}/move">
                                                    <svg width="16px" height="16px" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill="currentColor" d="M19,26a2,2,0,0,0-2,2V40H7V28a2,2,0,0,0-4,0V42a2,2,0,0,0,2,2H19a2,2,0,0,0,2-2V28A2,2,0,0,0,19,26Z"/>
                                                        <path fill="currentColor" d="M43,26a2,2,0,0,0-2,2V40H31V28a2,2,0,0,0-4,0V42a2,2,0,0,0,2,2H43a2,2,0,0,0,2-2V28A2,2,0,0,0,43,26Z"/>
                                                        <path fill="currentColor" d="M34,16v1.2l-2.6-2.6a1.9,1.9,0,0,0-3,.2,2.1,2.1,0,0,0,.2,2.7l6,5.9a1.9,1.9,0,0,0,2.8,0l6-5.9a2.1,2.1,0,0,0,.2-2.7,1.9,1.9,0,0,0-3-.2L38,17.2V16a14,14,0,0,0-28,0v6a2,2,0,0,0,4,0V16a10,10,0,0,1,20,0Z"/>
                                                    </svg>
                                                    <span>Переместить</span>
                                                </a>
                                                <a class="dropdown__item" href="/things/{{ $thing->id }}/delete">
                                                    <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M7 4C7 2.34315 8.34315 1 10 1H14C15.6569 1 17 2.34315 17 4V5H21C21.5523 5 22 5.44772 22 6C22 6.55228 21.5523 7 21 7H19.9394L19.1153 20.1871C19.0164 21.7682 17.7053 23 16.1211 23H7.8789C6.29471 23 4.98356 21.7682 4.88474 20.1871L4.06055 7H3C2.44772 7 2 6.55228 2 6C2 5.44772 2.44772 5 3 5H7V4ZM9 5H15V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V5ZM6.06445 7L6.88085 20.0624C6.91379 20.5894 7.35084 21 7.8789 21H16.1211C16.6492 21 17.0862 20.5894 17.1191 20.0624L17.9355 7H6.06445Z"/>
                                                    </svg>
                                                    <span>Удалить</span>
                                                </a>
                                                    @if($thing->owner)
                                                    <a class="dropdown__item" href="/things/{{ $thing->id }}/free">
                                                        <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7 11C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H17C17.5523 13 18 12.5523 18 12C18 11.4477 17.5523 11 17 11H7Z" fill="currentColor"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1ZM3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12Z" fill="currentColor"/>
                                                        </svg>
                                                        <span>Отказаться</span>
                                                    </a>
                                                    @endif
                                                @endcan
                                                @if(!$thing->owner)
                                                <a class="dropdown__item" href="/things/{{ $thing->id }}/use">
                                                    <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 6C12.5523 6 13 6.44772 13 7V11H17C17.5523 11 18 11.4477 18 12C18 12.5523 17.5523 13 17 13H13V17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17V13H7C6.44772 13 6 12.5523 6 12C6 11.4477 6.44772 11 7 11H11V7C11 6.44772 11.4477 6 12 6Z" fill="currentColor"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3Z" fill="currentColor"/>
                                                    </svg>
                                                    <span>Забрать</span>
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            <div class="col-12">
                {{ $things->links('pagination.default') }}
            </div>
        </div>
    </div>
@endsection
