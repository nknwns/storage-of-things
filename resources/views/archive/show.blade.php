@extends('layouts.layout')
@section('content')
    <div class="container thing-page">
        <div class="row">
            <div class="col-md-6 col-lg-5">
                <div class="thing-page__card card">
                    <div class="card__header">
                        <h2 class="card__title">Информация об архивированной вещи #{{ $archive->id }}</h2>
                    </div>
                    <div class="card__body">
                        <div class="card__field">
                            <div class="card__icon">
                                <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 6V19M6 6H18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="card__category">Название</h3>
                                <p class="card__text">{{ $archive->name }}</p>
                            </div>
                        </div>
                        <div class="card__field">
                            <div class="card__icon">
                                <svg fill="currentColor" width="40px" height="40px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21,7H3V4A1,1,0,0,1,4,3H20a1,1,0,0,1,1,1ZM3,20V9H21V20a1,1,0,0,1-1,1H4A1,1,0,0,1,3,20Zm3-6H18V12H6Zm0,4h6V16H6Z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="card__category">Описание</h3>
                                <p class="card__text">{{ $archive->description }}</p>
                            </div>
                        </div>
                        <div class="card__field">
                            <div class="card__icon">
                                <svg width="40px" height="40px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                    <path fill="currentColor" d="M12.144 1.157a8 8 0 10-.709 14.068 1 1 0 00-.858-1.806 6 6 0 112.86-7.955 1 1 0 001.814-.845 8 8 0 00-3.107-3.462z"/>
                                    <path fill="currentColor" d="M7 5a1 1 0 112 0v4a1 1 0 01-.553.894l-2 1a1 1 0 11-.894-1.788L7 8.382V5zm9 10a1 1 0 11-2 0 1 1 0 012 0zm-1-7a1 1 0 00-1 1v3a1 1 0 102 0V9a1 1 0 00-1-1z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="card__category">Дата истечения</h3>
                                <p class="card__text">{{ $archive->wrst }}</p>
                            </div>
                        </div>
                        <div class="card__field">
                            <div class="card__icon">
                                <svg fill="currentColor" width="40px" height="40px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6,22H18a3,3,0,0,0,3-3V7a2,2,0,0,0-2-2H17V3a1,1,0,0,0-2,0V5H9V3A1,1,0,0,0,7,3V5H5A2,2,0,0,0,3,7V19A3,3,0,0,0,6,22ZM5,12.5a.5.5,0,0,1,.5-.5h13a.5.5,0,0,1,.5.5V19a1,1,0,0,1-1,1H6a1,1,0,0,1-1-1Z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="card__category">Дата помещения в архив</h3>
                                <p class="card__text">{{ $archive->created_at }}</p>
                            </div>
                        </div>
                        <div class="card__field">
                            <div class="card__icon">
                                <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3.41016 22C3.41016 18.13 7.26015 15 12.0002 15C12.9602 15 13.8902 15.13 14.7602 15.37" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M22 18C22 18.75 21.79 19.46 21.42 20.06C21.21 20.42 20.94 20.74 20.63 21C19.93 21.63 19.01 22 18 22C16.54 22 15.27 21.22 14.58 20.06C14.21 19.46 14 18.75 14 18C14 16.74 14.58 15.61 15.5 14.88C16.19 14.33 17.06 14 18 14C20.21 14 22 15.79 22 18Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M16.4395 18L17.4294 18.99L19.5594 17.02" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="card__category">Автор</h3>
                                <p class="card__text">
                                    @if($archive->author()->id)
                                        <a class="card__link" href="/users/{{ $archive->author()->id }}">{{ $archive->author()->name }}</a>
                                    @else
                                        -
                                    @endif
                                </p>
                            </div>
                        </div>
                        @if($archive->recovered)
                        <div class="card__alert">
                            <p>Вещь восстановлена.</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-7">
                <div class="col-12">
                    <div class="card">
                        <div class="card__header">
                            <h2 class="card__title">Действия</h2>
                        </div>
                        <div class="card__body">
                            @auth
                                @if(!$archive->recovered)
                                <div class="card__actions">
                                    <div class="tooltip">
                                        <a href="/archive/{{ $archive->id}}/recover" class="tooltip__button card__action card__action--success">
                                            <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 6C12.5523 6 13 6.44772 13 7V11H17C17.5523 11 18 11.4477 18 12C18 12.5523 17.5523 13 17 13H13V17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17V13H7C6.44772 13 6 12.5523 6 12C6 11.4477 6.44772 11 7 11H11V7C11 6.44772 11.4477 6 12 6Z" fill="currentColor"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3Z" fill="currentColor"/>
                                            </svg>
                                        </a>
                                        <span class="tooltip__body tooltip__body--left">Восстановить</span>
                                    </div>
                                </div>
                            @endauth
                            @else
                            <div class="empty">
                                <img class="empty__image empty__image--small" src="/img/no.gif" alt="empty">
                                <p class="empty__message">Нет прав на управление вещью..</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
