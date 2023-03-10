@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="content__header">
                    <h2 class="content__title">Места</h2>
                    @can('create-place')
                        <a href="/places/create" class="content__button">
                            +
                            <span>Создать место</span>
                        </a>
                    @endcan
                </div>
            </div>
            @if (!$places->count())
                <div class="empty">
                    <img class="empty__image" src="/img/empty.gif" alt="empty">
                    <p class="empty__message">Список мест пуст..</p>
                </div>
            @endif
            @foreach ($places as $place)
            <div class="col-sm-6 col-lg-3 mb-3">
                <div class="place">
                    <div class="place__header">
                        <a href="/places/{{ $place->id }}" class="place__icon">
                            <svg height="20px" width="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 8V5.2C8 4.0799 8 3.51984 8.21799 3.09202C8.40973 2.71569 8.71569 2.40973 9.09202 2.21799C9.51984 2 10.0799 2 11.2 2H18.8C19.9201 2 20.4802 2 20.908 2.21799C21.2843 2.40973 21.5903 2.71569 21.782 3.09202C22 3.51984 22 4.0799 22 5.2V12.8C22 13.9201 22 14.4802 21.782 14.908C21.5903 15.2843 21.2843 15.5903 20.908 15.782C20.4802 16 19.9201 16 18.8 16H16M5.2 22H12.8C13.9201 22 14.4802 22 14.908 21.782C15.2843 21.5903 15.5903 21.2843 15.782 20.908C16 20.4802 16 19.9201 16 18.8V11.2C16 10.0799 16 9.51984 15.782 9.09202C15.5903 8.71569 15.2843 8.40973 14.908 8.21799C14.4802 8 13.9201 8 12.8 8H5.2C4.0799 8 3.51984 8 3.09202 8.21799C2.71569 8.40973 2.40973 8.71569 2.21799 9.09202C2 9.51984 2 10.0799 2 11.2V18.8C2 19.9201 2 20.4802 2.21799 20.908C2.40973 21.2843 2.71569 21.5903 3.09202 21.782C3.51984 22 4.07989 22 5.2 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <div class="place__functions">
                            <div class="place__function tooltip">
                                <svg class="tooltip__button" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 18.5C12.5523 18.5 13 18.0523 13 17.5L13 10.5C13 9.94772 12.5523 9.5 12 9.5C11.4477 9.5 11 9.94772 11 10.5L11 17.5C11 18.0523 11.4477 18.5 12 18.5Z" fill="#000000"/>
                                    <path d="M12 8.5C12.8284 8.5 13.5 7.82843 13.5 7C13.5 6.17157 12.8284 5.5 12 5.5C11.1716 5.5 10.5 6.17157 10.5 7C10.5 7.82843 11.1716 8.5 12 8.5Z" fill="#000000"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1 12C1 18.0751 5.92487 23 12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1C5.92487 1 1 5.92487 1 12ZM12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21Z" fill="currentColor"/>
                                </svg>
                                <div class="tooltip__body">
                                    {{ $place->description }}
                                </div>
                            </div>
                            <div class="place__function dropdown">
                                <svg class="dropdown__button" width="20px" height="20px" viewBox="0 0 24 24">
                                    <circle stroke="currentColor" stroke-width="2" stroke-linecap="round" cx="12" cy="12" r="3" fill="none" />
                                    <path d="M10.069,3.36281 C10.7151,1.54573 13.2849,1.54573 13.931,3.3628 C14.338,4.5071 15.6451,5.04852 16.742,4.52713 C18.4837,3.69918 20.3008,5.51625 19.4729,7.25803 C18.9515,8.35491 19.4929,9.66203 20.6372,10.069 C22.4543,10.7151 22.4543,13.2849 20.6372,13.931 C19.4929,14.338 18.9515,15.6451 19.4729,16.742 C20.3008,18.4837 18.4837,20.3008 16.742,19.4729 C15.6451,18.9515 14.338,19.4929 13.931,20.6372 C13.2849,22.4543 10.7151,22.4543 10.069,20.6372 C9.66203,19.4929 8.35491,18.9515 7.25803,19.4729 C5.51625,20.3008 3.69918,18.4837 4.52713,16.742 C5.04852,15.6451 4.5071,14.338 3.3628,13.931 C1.54573,13.2849 1.54573,10.7151 3.36281,10.069 C4.5071,9.66203 5.04852,8.35491 4.52713,7.25803 C3.69918,5.51625 5.51625,3.69918 7.25803,4.52713 C8.35491,5.04852 9.66203,4.5071 10.069,3.36281 Z" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                </svg>
                                <div class="dropdown__menu dropdown__menu--button">
                                    <a href="/places/{{ $place->id }}" class="dropdown__item">
                                        <svg width="16px" height="20px" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                                            <path stroke="currentColor" stroke-width="2" d="M20.188 10.9343C20.5762 11.4056 20.7703 11.6412 20.7703 12C20.7703 12.3588 20.5762 12.5944 20.188 13.0657C18.7679 14.7899 15.6357 18 12 18C8.36427 18 5.23206 14.7899 3.81197 13.0657C3.42381 12.5944 3.22973 12.3588 3.22973 12C3.22973 11.6412 3.42381 11.4056 3.81197 10.9343C5.23206 9.21014 8.36427 6 12 6C15.6357 6 18.7679 9.21014 20.188 10.9343Z"/>
                                        </svg>
                                        <span>Просмотреть</span>
                                    </a>
                                    @can('update-place', $place)
                                    <a href="/places/{{ $place->id }}/edit" class="dropdown__item">
                                        <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M18 9.99982L14 5.99982M2.5 21.4998L5.88437 21.1238C6.29786 21.0778 6.5046 21.0549 6.69785 20.9923C6.86929 20.9368 7.03245 20.8584 7.18289 20.7592C7.35245 20.6474 7.49955 20.5003 7.79373 20.2061L21 6.99982C22.1046 5.89525 22.1046 4.10438 21 2.99981C19.8955 1.89525 18.1046 1.89524 17 2.99981L3.79373 16.2061C3.49955 16.5003 3.35246 16.6474 3.24064 16.8169C3.14143 16.9674 3.06301 17.1305 3.00751 17.302C2.94496 17.4952 2.92198 17.702 2.87604 18.1155L2.5 21.4998Z"/>
                                        </svg>
                                        <span>Редактировать</span>
                                    </a>
                                    <a href="/places/{{ $place->id }}/delete" class="dropdown__item">
                                        <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M7 4C7 2.34315 8.34315 1 10 1H14C15.6569 1 17 2.34315 17 4V5H21C21.5523 5 22 5.44772 22 6C22 6.55228 21.5523 7 21 7H19.9394L19.1153 20.1871C19.0164 21.7682 17.7053 23 16.1211 23H7.8789C6.29471 23 4.98356 21.7682 4.88474 20.1871L4.06055 7H3C2.44772 7 2 6.55228 2 6C2 5.44772 2.44772 5 3 5H7V4ZM9 5H15V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V5ZM6.06445 7L6.88085 20.0624C6.91379 20.5894 7.35084 21 7.8789 21H16.1211C16.6492 21 17.0862 20.5894 17.1191 20.0624L17.9355 7H6.06445Z"/>
                                        </svg>
                                        <span>Удалить</span>
                                    </a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/places/{{ $place->id }}" class="place__body">
                        <h3 class="place__title">{{ $place->name }}</h3>
                        <p class="place__items">
                            <svg fill="currentColor" height="24px" width="24px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 436.682 436.682" xml:space="preserve">
                                <g>
                                    <path d="M419.538,296.204c-0.537-2.448-1.546-4.881-3.753-7.117c-38.465-38.955-72.197-93.147-127.275-104.255
                                        c-32.363-6.527-124.525-19.188-148.856,10.098c-6.377,7.675-5.5,22.762,6.555,24.829c22.465,3.852,48.517,0.77,69.917,5.355
                                        c91.889,19.687-19.347,14.323-37.679,15.025c-74.371,2.847-94.568-47.89-146.259-87.637c-5.27-4.052-13.154-1.609-17.579,2.267
                                        c-0.36,0.315-0.72,0.63-1.079,0.945c-9.295,1.69-17.898,12.369-11.076,21.409c31.418,41.641,69.831,92.706,117.474,116.47
                                        c56.919,28.392,147.166,9.676,208.442,7.403c0.485-0.018,0.813-0.247,1.272-0.303c15.578,16.76,32.267,32.523,46.979,50.062
                                        c11.267,13.432,26.145,33.099,44.92,17.833C445.329,349.25,438.327,316.277,419.538,296.204z"/>
                                    <path d="M301.467,158.61c2.273-3.137,1.617-7.566,0-10.762c-9.917-19.608-45.334-14.431-63.168-15.171
                                        c-41.628-1.729-83.746-2.505-125.258,1.4c-5.481,0.516-8.996,3.959-9.499,9.499c-1.141,12.572-1.318,23.581-0.223,35.764
                                        c-1.385,5.494-0.51,11.843,3.471,19.271c3.155,5.886,11.09,2.57,11.616-3.146c3.694-40.058,149.973-21.335,179.003-27.149
                                        c4.649-0.931,5.691-5.96,4.009-9.64L301.467,158.61z"/>
                                    <path d="M285.63,74.009c-7.285-6.307-18.913-6.531-30.277-5.677c-41.574-4.319-84.155,1.007-124.602-5.042
                                        c-19.003-2.843-29.715,2.356-33.43,16.879c-2.024,6.371-2.078,7.275-1.541,15.492c0.174,2.659,1.294,4.644,2.787,6.16
                                        c0.154,0.861,0.162,1.73,0.346,2.59c0.206,1.543,1.01,2.606,1.7,3.759c0.04,3.992,1.998,7.884,6.311,8.91
                                        c24.499,5.834,47.755,4.077,72.403-0.035c1.169-0.196,2.369-0.25,3.543-0.425c5.817,0.053,11.58,0.149,17.186,0.469
                                        c12.411,0.71,24.821,1.519,37.231,2.257c11.572,0.687,30.539,5.927,41.592,2.964C297.059,117.435,298.452,85.109,285.63,74.009z"/>
                                </g>
                            </svg>
                            <span>{{ $place->things_count }} вещей</span>
                        </p>
                    </a>
                </div>
            </div>
            @endforeach
            <div class="col-12">
                {{ $places->links('pagination.default') }}
            </div>
        </div>
    </div>
@endsection
