@extends('layouts.layout')
@section('content')
    <div class="container thing-page">
        <div class="row">
            <div class="col-md-6 col-lg-5">
                <div class="thing-page__card card">
                    <div class="card__header">
                        <h2 class="card__title">Информация о вещи #{{ $thing->id }}</h2>
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
                                <p class="card__text">{{ $thing->name }}</p>
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
                                <p class="card__text">{{ $thing->description ? $thing->description : '-' }}</p>
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
                                <p class="card__text">{{ $thing->wrst }}</p>
                            </div>
                        </div>
                        <div class="card__field">
                            <div class="card__icon">
                                <svg fill="currentColor" width="40px" height="40px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6,22H18a3,3,0,0,0,3-3V7a2,2,0,0,0-2-2H17V3a1,1,0,0,0-2,0V5H9V3A1,1,0,0,0,7,3V5H5A2,2,0,0,0,3,7V19A3,3,0,0,0,6,22ZM5,12.5a.5.5,0,0,1,.5-.5h13a.5.5,0,0,1,.5.5V19a1,1,0,0,1-1,1H6a1,1,0,0,1-1-1Z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="card__category">Дата создания</h3>
                                <p class="card__text">{{ $thing->created_at }}</p>
                            </div>
                        </div>
                        <div class="card__field">
                            <div class="card__icon">
                                <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.9844 10H17M20.9844 10V6M20.9844 10L17.6569 6.34315C14.5327 3.21895 9.46734 3.21895 6.34315 6.34315C3.21895 9.46734 3.21895 14.5327 6.34315 17.6569C9.46734 20.781 14.5327 20.781 17.6569 17.6569C18.4407 16.873 19.0279 15.9669 19.4184 15M12 9V13L15 14.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="card__category">Дата обновления</h3>
                                <p class="card__text">{{ $thing->updated_at }}</p>
                            </div>
                        </div>
                        <div class="card__field">
                            <div class="card__icon">
                                <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3.40991 22C3.40991 18.13 7.25991 15 11.9999 15C12.9599 15 13.8899 15.13 14.7599 15.37" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M22 18C22 18.32 21.96 18.63 21.88 18.93C21.79 19.33 21.63 19.72 21.42 20.06C20.73 21.22 19.46 22 18 22C16.97 22 16.04 21.61 15.34 20.97C15.04 20.71 14.78 20.4 14.58 20.06C14.21 19.46 14 18.75 14 18C14 16.92 14.43 15.93 15.13 15.21C15.86 14.46 16.88 14 18 14C19.18 14 20.25 14.51 20.97 15.33C21.61 16.04 22 16.98 22 18Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M19.49 17.98H16.51" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M18 16.52V19.51" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="card__category">Владелец</h3>
                                <p class="card__text">
                                    @if($thing->owner()->first())
                                        <a class="card__link" href="/users/{{ $thing->owner()->first()->id }}">{{ $thing->owner()->first()->name }}</a>
                                    @else
                                        -
                                    @endif
                                </p>
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
                                    @if($thing->author()->first()->id)
                                        <a class="card__link" href="/users/{{ $thing->author()->first()->id }}">{{ $thing->author()->first()->name }}</a>
                                    @else
                                        -
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="card__field">
                            <div class="card__icon">
                                <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 11.1716V5C3 3.89543 3.89543 3 5 3H11.1716C11.702 3 12.2107 3.21071 12.5858 3.58579L20.5858 11.5858C21.3668 12.3668 21.3668 13.6332 20.5858 14.4142L14.4142 20.5858C13.6332 21.3668 12.3668 21.3668 11.5858 20.5858L3.58579 12.5858C3.21071 12.2107 3 11.702 3 11.1716Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                    <path d="M7 7H7.001" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="card__category">Место</h3>
                                <p class="card__text">
                                    @if($thing->place())
                                        <a class="card__link" href="/places/{{ $thing->place()->id }}">{{ $thing->place()->name }}</a>
                                    @else
                                        -
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-7">
                <div class="col-12">
                    <div class="card">
                        <div class="card__header">
                            <h2 class="card__title">История</h2>
                        </div>
                        <div class="card__body">
                            @if(!$history->count())
                                <div class="empty">
                                    <img class="empty__image empty__image--small" src="/img/empty.gif" alt="empty">
                                    <p class="empty__message">История этой вещи пуста..</p>
                                </div>
                            @endif
                            @foreach ($history as $historyObject)
                                <div class="card__field card__field--line">
                                    <div class="badge">{{ $historyObject->created_at }}</div>
                                    @if($historyObject->field == 'owner_id')
                                        <p class="card__history">
                                            @if($historyObject->new_value)
                                                Вещь передана. Новый владелец: <a class="card__link" href="/users/{{ $historyObject->new_value->id }}">{{ $historyObject->new_value->name }}</a>
                                            @else
                                                Владелец (<a class="card__link" href="/users/{{ $historyObject->old_value->id }}">{{ $historyObject->old_value->name }}</a>) отказался от вещи.
                                            @endif
                                        </p>
                                    @else
                                        <p class="card__history">
                                            Изменено описание вещи. Изменил: <a class="card__link" href="/users/{{ $historyObject->author->id }}">{{ $historyObject->author->name }}</a>
                                        </p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card__header">
                            <h2 class="card__title">Действия</h2>
                        </div>
                        <div class="card__body">
                            <div class="card__actions">
                                @if(!$thing->owner_id)
                                    <div class="tooltip">
                                        <a href="/things/{{ $thing->id }}/use" class="tooltip__button card__action card__action--success">
                                            <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 6C12.5523 6 13 6.44772 13 7V11H17C17.5523 11 18 11.4477 18 12C18 12.5523 17.5523 13 17 13H13V17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17V13H7C6.44772 13 6 12.5523 6 12C6 11.4477 6.44772 11 7 11H11V7C11 6.44772 11.4477 6 12 6Z" fill="currentColor"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3Z" fill="currentColor"/>
                                            </svg>
                                        </a>
                                        <span class="tooltip__body tooltip__body--left">Забрать</span>
                                    </div>
                                @endif
                                @can('update-thing', $thing)
                                    <div class="tooltip">
                                        <a href="/things/{{ $thing->id }}/edit" class="tooltip__button card__action card__action--warning">
                                            <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M18 9.99982L14 5.99982M2.5 21.4998L5.88437 21.1238C6.29786 21.0778 6.5046 21.0549 6.69785 20.9923C6.86929 20.9368 7.03245 20.8584 7.18289 20.7592C7.35245 20.6474 7.49955 20.5003 7.79373 20.2061L21 6.99982C22.1046 5.89525 22.1046 4.10438 21 2.99981C19.8955 1.89525 18.1046 1.89524 17 2.99981L3.79373 16.2061C3.49955 16.5003 3.35246 16.6474 3.24064 16.8169C3.14143 16.9674 3.06301 17.1305 3.00751 17.302C2.94496 17.4952 2.92198 17.702 2.87604 18.1155L2.5 21.4998Z"/>
                                            </svg>
                                        </a>
                                        <span class="tooltip__body tooltip__body--left">Редактировать</span>
                                    </div>
                                    <div class="tooltip">
                                        <a href="/things/{{ $thing->id }}/delete" class="tooltip__button card__action card__action--danger">
                                            <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M7 4C7 2.34315 8.34315 1 10 1H14C15.6569 1 17 2.34315 17 4V5H21C21.5523 5 22 5.44772 22 6C22 6.55228 21.5523 7 21 7H19.9394L19.1153 20.1871C19.0164 21.7682 17.7053 23 16.1211 23H7.8789C6.29471 23 4.98356 21.7682 4.88474 20.1871L4.06055 7H3C2.44772 7 2 6.55228 2 6C2 5.44772 2.44772 5 3 5H7V4ZM9 5H15V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V5ZM6.06445 7L6.88085 20.0624C6.91379 20.5894 7.35084 21 7.8789 21H16.1211C16.6492 21 17.0862 20.5894 17.1191 20.0624L17.9355 7H6.06445Z"/>
                                            </svg>
                                        </a>
                                        <span class="tooltip__body tooltip__body--left">Удалить</span>
                                    </div>
                                    <div class="tooltip">
                                        <a href="/things/{{ $thing->id }}/free" class="tooltip__button card__action card__action--secondary">
                                            <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7 11C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H17C17.5523 13 18 12.5523 18 12C18 11.4477 17.5523 11 17 11H7Z" fill="currentColor"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1ZM3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12Z" fill="currentColor"/>
                                            </svg>
                                        </a>
                                        <span class="tooltip__body tooltip__body--left">Отказаться</span>
                                    </div>
                                    <div class="tooltip">
                                        <a href="/things/{{ $thing->id }}/move" class="tooltip__button card__action card__action--success">
                                            <svg width="50px" height="50px" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                                <path fill="currentColor" d="M19,26a2,2,0,0,0-2,2V40H7V28a2,2,0,0,0-4,0V42a2,2,0,0,0,2,2H19a2,2,0,0,0,2-2V28A2,2,0,0,0,19,26Z"/>
                                                <path fill="currentColor" d="M43,26a2,2,0,0,0-2,2V40H31V28a2,2,0,0,0-4,0V42a2,2,0,0,0,2,2H43a2,2,0,0,0,2-2V28A2,2,0,0,0,43,26Z"/>
                                                <path fill="currentColor" d="M34,16v1.2l-2.6-2.6a1.9,1.9,0,0,0-3,.2,2.1,2.1,0,0,0,.2,2.7l6,5.9a1.9,1.9,0,0,0,2.8,0l6-5.9a2.1,2.1,0,0,0,.2-2.7,1.9,1.9,0,0,0-3-.2L38,17.2V16a14,14,0,0,0-28,0v6a2,2,0,0,0,4,0V16a10,10,0,0,1,20,0Z"/>
                                            </svg>
                                        </a>
                                        <span class="tooltip__body tooltip__body--left">Переместить</span>
                                    </div>
                                @else
                            </div>
                            <div class="empty">
                                <img class="empty__image empty__image--small" src="/img/no.gif" alt="empty">
                                <p class="empty__message">Нет прав на управление вещью..</p>
                            </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
