@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content__header">
                    <h2 class="content__title">Архив</h2>
                </div>
            </div>
            @if (!$archive->count())
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
                                <th scope="col">Создатель</th>
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($archive as $thing)
                                @if ($thing->recovered)
                                    <tr class="thing thing--success">
                                @else
                                    <tr class="thing">
                                @endif
                                    <td>{{ $thing->id }}</td>
                                    <td>
                                        <a href="/archive/{{ $thing->id }}" class="thing__link thing__name">
                                            <div class="thing__icon">

                                            </div>
                                            <span>{{ $thing->name }}</span>
                                        </a>
                                    </td>
                                    <td>{{ $thing->description }}</td>
                                    <td>{{ $thing->wrst }}</td>
                                    <td>
                                        @if ($thing->author())
                                            <a href="/users/{{ $thing->author()->id }}" class="thing__link">{{ $thing->author()->name }}</a>
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
                                                <a class="dropdown__item" href="/archive/{{ $thing->id }}">
                                                    <svg width="16px" height="20px" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                                                        <path stroke="currentColor" stroke-width="2" d="M20.188 10.9343C20.5762 11.4056 20.7703 11.6412 20.7703 12C20.7703 12.3588 20.5762 12.5944 20.188 13.0657C18.7679 14.7899 15.6357 18 12 18C8.36427 18 5.23206 14.7899 3.81197 13.0657C3.42381 12.5944 3.22973 12.3588 3.22973 12C3.22973 11.6412 3.42381 11.4056 3.81197 10.9343C5.23206 9.21014 8.36427 6 12 6C15.6357 6 18.7679 9.21014 20.188 10.9343Z"/>
                                                    </svg>
                                                    <span>Просмотреть</span>
                                                </a>
                                                @auth
                                                    @if(!$thing->recovered)
                                                    <a class="dropdown__item" href="/archive/{{ $thing->id }}/recover">
                                                        <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 6C12.5523 6 13 6.44772 13 7V11H17C17.5523 11 18 11.4477 18 12C18 12.5523 17.5523 13 17 13H13V17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17V13H7C6.44772 13 6 12.5523 6 12C6 11.4477 6.44772 11 7 11H11V7C11 6.44772 11.4477 6 12 6Z" fill="currentColor"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3Z" fill="currentColor"/>
                                                        </svg>
                                                        <span>Восстановить</span>
                                                    </a>
                                                    @endif
                                                @endauth
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
                {{ $archive->links('pagination.default') }}
            </div>
        </div>
    </div>
@endsection
