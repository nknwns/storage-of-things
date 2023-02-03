@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-5 mb-3">
                <div class="card">
                    <div class="card__header">
                        <h2 class="card__title">Информация о месте #{{ $place->id }}</h2>
                    </div>
                    <div class="card__body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <div class="card__field">
                                    <div class="card__icon">
                                        <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 6V19M6 6H18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="card__category">Название</h3>
                                        <p class="card__text">{{ $place->name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="card__field">
                                    <div class="card__icon">
                                        <svg fill="currentColor" width="40px" height="40px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21,7H3V4A1,1,0,0,1,4,3H20a1,1,0,0,1,1,1ZM3,20V9H21V20a1,1,0,0,1-1,1H4A1,1,0,0,1,3,20Zm3-6H18V12H6Zm0,4h6V16H6Z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="card__category">Описание</h3>
                                        <p class="card__text">{{ $place->description ? $place->description : '-' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="card__field">
                                    <div class="card__icon">
                                        <svg fill="currentColor" width="40px" height="40px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6,22H18a3,3,0,0,0,3-3V7a2,2,0,0,0-2-2H17V3a1,1,0,0,0-2,0V5H9V3A1,1,0,0,0,7,3V5H5A2,2,0,0,0,3,7V19A3,3,0,0,0,6,22ZM5,12.5a.5.5,0,0,1,.5-.5h13a.5.5,0,0,1,.5.5V19a1,1,0,0,1-1,1H6a1,1,0,0,1-1-1Z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="card__category">Дата создания</h3>
                                        <p class="card__text">{{ $place->created_at }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div class="card__field">
                                    <div class="card__icon">
                                        <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20.9844 10H17M20.9844 10V6M20.9844 10L17.6569 6.34315C14.5327 3.21895 9.46734 3.21895 6.34315 6.34315C3.21895 9.46734 3.21895 14.5327 6.34315 17.6569C9.46734 20.781 14.5327 20.781 17.6569 17.6569C18.4407 16.873 19.0279 15.9669 19.4184 15M12 9V13L15 14.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="card__category">Дата обновления</h3>
                                        <p class="card__text">{{ $place->updated_at }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
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
                                        <h3 class="card__category">Владелец</h3>
                                        <p class="card__text">
                                            @if($place->getAuthor())
                                                <a class="card__link" href="/users/{{ $place->getAuthor()->id }}">{{ $place->getAuthor()->name }}</a>
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7 mb-3">
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
                                @if($historyObject->field == 'author_id')
                                    <p class="card__history">
                                        @if($historyObject->new_value)
                                            Место передано. Новый владелец: <a class="card__link" href="/users/{{ $historyObject->new_value->id }}">{{ $historyObject->new_value->name }}</a>
                                        @else
                                            Владелец (<a class="card__link" href="/users/{{ $historyObject->old_value->id }}">{{ $historyObject->old_value->name }}</a>) отказался от места.
                                        @endif
                                    </p>
                                @elseif($historyObject->field == 'status')
                                    <p class="card__history">
                                        Статус места изменен. Новый статус:
                                        @if($historyObject->new_value == 'working')
                                            В работе
                                        @elseif($historyObject->new_value == 'repairing')
                                            Ремонт/мойка
                                        @else
                                            В ожидании
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
            <div class="col-2">
                <div class="card">
                    <div class="card__body">
                        <div class="card__box">
                            <svg width="100px" height="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5021 1.40276C10.9577 1.14026 11.4742 1.00208 12 1.00208C12.5258 1.00208 13.0424 1.14027 13.4979 1.4028L13.5 1.404L20.5 5.40399C20.87 5.61763 21.1892 5.90725 21.437 6.25252C21.4973 6.31286 21.5508 6.38195 21.5955 6.45928C21.6341 6.52587 21.664 6.59505 21.6858 6.66555C21.8916 7.07909 21.9995 7.5354 22 7.999V16.0011C21.9995 16.5271 21.8606 17.0438 21.5973 17.4993C21.334 17.9548 20.9556 18.333 20.5 18.5961L20.4961 18.5983L13.5 22.5961L13.4982 22.5971C13.181 22.7799 12.8341 22.9025 12.4752 22.9601C12.3338 23.0366 12.172 23.08 12 23.08C11.828 23.08 11.6662 23.0366 11.5248 22.9601C11.1659 22.9025 10.8191 22.78 10.5019 22.5971L10.5 22.5961L3.50386 18.5983L3.5 18.5961C3.04439 18.333 2.66597 17.9548 2.40269 17.4993C2.13941 17.0438 2.00054 16.5271 2 16.0011V7.999C2.00048 7.53563 2.10827 7.07955 2.31385 6.66618C2.33566 6.59546 2.3657 6.52606 2.40433 6.45928C2.44917 6.38177 2.50282 6.31254 2.56328 6.25211C2.8111 5.90702 3.13012 5.61755 3.5 5.404L3.50386 5.40177L10.5021 1.40276ZM13 20.5783L19.5 16.864L19.5016 16.8631C19.6527 16.7754 19.7783 16.6497 19.8658 16.4984C19.9535 16.3466 19.9998 16.1744 20 15.999V8.53751L13 12.5868V20.5783ZM11 12.5868V20.5783L4.5 16.864L4.49842 16.8631C4.34726 16.7754 4.22169 16.6497 4.13423 16.4984C4.04654 16.3467 4.00025 16.1746 4 15.9994V8.53758L11 12.5868ZM12.5 3.13606L18.961 6.82803L11.9999 10.8547L5.03897 6.82807L11.4961 3.13828L11.5 3.13605C11.652 3.04828 11.8245 3.00208 12 3.00208C12.1755 3.00208 12.348 3.04829 12.5 3.13606Z" fill="currentColor"/>
                            </svg>
                            <p>{{ $place->thingsCount }} вещи</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card">
                    <div class="card__body">
                        <div class="card__box">
                            @if($place->repair)
                                <svg fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" width="100px" height="100px" viewBox="0 0 959.999 959.999" xml:space="preserve">
                                    <path d="M628.833,459.92l67.596-67.596c48.836,19.389,103.95,18.183,152.007-3.614c11.799-5.353,14.622-20.844,5.46-30.006L733.52,238.329c-14.625-14.625-14.625-38.338,0-52.963L853.771,65.114c9.221-9.222,6.385-24.827-5.497-30.203C776.762,2.554,689.668,15.763,630.885,74.545c-55.213,55.212-70.079,135.975-44.618,204.958l-68.926,68.926L628.833,459.92z"/>
                                    <path d="M499.665,366.106l-93.414-93.414L294.76,384.184l93.414,93.414l111.49,111.491l341.527,341.527c4.877,4.877,11.271,7.316,17.662,7.316c6.393,0,12.785-2.439,17.662-7.316l76.166-76.166c9.755-9.756,9.755-25.57,0-35.324L611.155,477.598L499.665,366.106z"/>
                                    <path d="M904.345,127.995l-99.869,99.869c-7.984,7.984-7.984,20.93,0,28.914l76.972,76.972c8.594,8.593,22.826,7.907,30.371-1.619c45.178-57.037,53.729-133.579,25.659-198.004C931.75,120.981,914.483,117.855,904.345,127.995z"/>
                                    <path d="M139.613,601.295L259.988,721.67c14.625,14.625,14.625,38.338,0,52.963L139.737,894.885c-9.221,9.221-6.385,24.828,5.497,30.203c71.512,32.355,158.606,19.148,217.39-39.635c55.014-55.014,69.968-135.395,44.888-204.213l74.476-74.475l-111.489-111.49l-72.694,72.693c-49.015-19.688-104.434-18.584-152.729,3.322C133.274,576.641,130.452,592.135,139.613,601.295z"/>
                                    <path d="M81.69,629.866c-45.177,57.037-53.728,133.58-25.659,198.004c5.727,13.146,22.994,16.271,33.133,6.133l99.869-99.869c7.984-7.984,7.984-20.93,0-28.914l-76.972-76.971C103.468,619.655,89.235,620.34,81.69,629.866z"/>
                                    <path d="M138.849,461.443c11.956,11.956,31.339,11.956,43.295,0l5.772-5.772c11.956-11.955,11.956-31.339,0-43.294l-11.545-11.545l22.731-22.73L92.309,271.308l-22.73,22.73l-11.545-11.545c-11.956-11.955-31.339-11.955-43.295,0l-5.772,5.773c-11.956,11.956-11.956,31.339,0,43.294L138.849,461.443z"/>
                                    <path d="M304.036,65.967l105.457,105.457c121.583-81.009,189.546-13.059,96.078-106.526C440.93,0.256,359.305,30.842,304.036,65.967z"/>
                                    <path d="M271.62,68.906c-5.978-5.978-13.812-8.967-21.647-8.967s-15.67,2.989-21.647,8.967L98.441,198.79c-11.956,11.955-11.956,31.339,0,43.295l11.545,11.545l106.793,106.793l11.545,11.545c5.978,5.978,13.812,8.967,21.647,8.967c1.894,0,3.788-0.179,5.655-0.528c4.374-0.817,8.603-2.592,12.352-5.324c1.272-0.929,2.491-1.965,3.64-3.113l5.462-5.462l111.49-111.491l8.838-8.838l4.094-4.093c1.631-1.631,3.031-3.405,4.218-5.275c7.507-11.836,6.105-27.696-4.218-38.02l-12.571-12.571L283.044,80.33L271.62,68.906z"/>
                                </svg>
                                <p>Ремонт/мойка</p>
                            @elseif($place->work)
                                <svg width="100px" height="100px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 12H3V8C3 6.89543 3.89543 6 5 6H9M4 12V18C4 19.1046 4.89543 20 6 20H18C19.1046 20 20 19.1046 20 18V12M4 12H10M20 12H21V8C21 6.89543 20.1046 6 19 6H15M20 12H14M14 12V10H10V12M14 12V14H10V12M9 6V5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V6M9 6H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p>В работе</p>
                            @else
                                <svg height="100px" width="100px" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"  xml:space="preserve">
                                    <path fill="currentColor" d="M329.364,237.908l42.558-39.905c25.236-23.661,39.552-56.701,39.552-91.292V49.156c0.009-13.514-5.53-25.918-14.402-34.754C388.235,5.529,375.833-0.009,362.318,0H149.681c-13.514-0.009-25.926,5.529-34.763,14.401c-8.871,8.837-14.41,21.24-14.392,34.754v57.554c0,34.591,14.315,67.632,39.552,91.292l42.55,39.888c2.342,2.205,3.678,5.271,3.678,8.492v19.234c0,3.221-1.336,6.279-3.669,8.476l-42.558,39.905c-25.237,23.652-39.552,56.701-39.552,91.292v57.554c-0.018,13.515,5.522,25.918,14.392,34.755c8.838,8.871,21.249,14.41,34.763,14.401h212.636c13.515,0.009,25.918-5.53,34.755-14.401c8.871-8.838,14.41-21.24,14.402-34.755V405.29c0-34.591-14.316-67.64-39.552-91.292l-42.55-39.897c-2.352-2.205-3.678-5.263-3.678-8.484v-19.234C325.694,243.162,327.021,240.096,329.364,237.908z M373.946,462.844c-0.009,3.273-1.274,6.056-3.411,8.218c-2.162,2.136-4.944,3.402-8.218,3.41H149.681c-3.273-0.009-6.064-1.274-8.226-3.41c-2.136-2.162-3.393-4.945-3.402-8.218V405.29c0-24.212,10.026-47.356,27.691-63.91l42.55-39.906c9.914-9.285,15.539-22.273,15.539-35.857v-19.234c0-13.592-5.625-26.58-15.547-35.866l-42.542-39.896c-17.666-16.554-27.691-39.69-27.691-63.91V49.156c0.009-3.273,1.266-6.055,3.402-8.226c2.162-2.127,4.953-3.394,8.226-3.402h212.636c3.273,0.008,6.056,1.274,8.218,3.402c2.136,2.171,3.402,4.952,3.411,8.226v57.554c0,24.22-10.026,47.356-27.692,63.91l-42.55,39.896c-9.914,9.286-15.538,22.274-15.538,35.866v19.234c0,13.584,5.625,26.572,15.547,35.874l42.541,39.88c17.666,16.563,27.692,39.707,27.692,63.919V462.844z"/>
                                     <path fill="currentColor" d="M237.261,378.95l-77.33,77.33h192.128l-77.33-77.33C264.385,368.614,247.615,368.614,237.261,378.95z"/>
                                </svg>
                                <p>В ожидании</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card__header">
                        <h2 class="card__title">Действия</h2>
                    </div>
                    <div class="card__body">
                        <div class="card__actions">
                            @auth
                                <div class="tooltip">
                                    <a href="/places/{{ $place->id }}/things" class="tooltip__button card__action card__action--success">
                                        <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 6C12.5523 6 13 6.44772 13 7V11H17C17.5523 11 18 11.4477 18 12C18 12.5523 17.5523 13 17 13H13V17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17V13H7C6.44772 13 6 12.5523 6 12C6 11.4477 6.44772 11 7 11H11V7C11 6.44772 11.4477 6 12 6Z" fill="currentColor"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3Z" fill="currentColor"/>
                                        </svg>
                                    </a>
                                    <span class="tooltip__body tooltip__body--left">Добавить вещь</span>
                                </div>
                            @endauth
                            @can('update-place', $place)
                                <div class="tooltip">
                                    <a href="/places/{{ $place->id }}/edit" class="tooltip__button card__action card__action--warning">
                                        <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M18 9.99982L14 5.99982M2.5 21.4998L5.88437 21.1238C6.29786 21.0778 6.5046 21.0549 6.69785 20.9923C6.86929 20.9368 7.03245 20.8584 7.18289 20.7592C7.35245 20.6474 7.49955 20.5003 7.79373 20.2061L21 6.99982C22.1046 5.89525 22.1046 4.10438 21 2.99981C19.8955 1.89525 18.1046 1.89524 17 2.99981L3.79373 16.2061C3.49955 16.5003 3.35246 16.6474 3.24064 16.8169C3.14143 16.9674 3.06301 17.1305 3.00751 17.302C2.94496 17.4952 2.92198 17.702 2.87604 18.1155L2.5 21.4998Z"/>
                                        </svg>
                                    </a>
                                    <span class="tooltip__body tooltip__body--left">Редактировать</span>
                                </div>
                                <div class="tooltip">
                                    <a href="/places/{{ $place->id }}/delete" class="tooltip__button card__action card__action--danger">
                                        <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M7 4C7 2.34315 8.34315 1 10 1H14C15.6569 1 17 2.34315 17 4V5H21C21.5523 5 22 5.44772 22 6C22 6.55228 21.5523 7 21 7H19.9394L19.1153 20.1871C19.0164 21.7682 17.7053 23 16.1211 23H7.8789C6.29471 23 4.98356 21.7682 4.88474 20.1871L4.06055 7H3C2.44772 7 2 6.55228 2 6C2 5.44772 2.44772 5 3 5H7V4ZM9 5H15V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V5ZM6.06445 7L6.88085 20.0624C6.91379 20.5894 7.35084 21 7.8789 21H16.1211C16.6492 21 17.0862 20.5894 17.1191 20.0624L17.9355 7H6.06445Z"/>
                                        </svg>
                                    </a>
                                    <span class="tooltip__body tooltip__body--left">Удалить</span>
                                </div>
                            @else
                        </div>
                        <div class="empty">
                            <img class="empty__image empty__image--small" src="/img/no.gif" alt="empty">
                            <p class="empty__message">Нет прав на управление местом..</p>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
            @if (!$things->count())
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card__body">
                            <div class="empty">
                                <img class="empty__image" src="/img/empty.gif" alt="empty">
                                <p class="empty__message">Список вещей пуст..</p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <div class="col-12 mt-3">
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
                        @foreach ($things as $thingParent)
                            <tr class="thing">
                                <td>{{ $thingParent->thing->id }}</td>
                                <td>
                                    <a href="/things/{{ $thingParent->thing->id }}" class="thing__link thing__name">
                                        <div class="thing__icon">

                                        </div>
                                        <span>{{ $thingParent->thing->name }}</span>
                                    </a>
                                </td>
                                <td>{{ $thingParent->thing->description ? $thingParent->thing->description : '-' }}</td>
                                <td>{{ $thingParent->thing->wrst }}</td>
                                <td>
                                    @if ($thingParent->thing->owner)
                                        <a href="/users/{{ $thingParent->thing->owner->id }}" class="thing__link">{{ $thingParent->thing->owner->name }}</a>
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
                                            <a class="dropdown__item" href="/things/{{ $thingParent->thing->id }}">
                                                <svg width="16px" height="20px" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/>
                                                    <path stroke="currentColor" stroke-width="2" d="M20.188 10.9343C20.5762 11.4056 20.7703 11.6412 20.7703 12C20.7703 12.3588 20.5762 12.5944 20.188 13.0657C18.7679 14.7899 15.6357 18 12 18C8.36427 18 5.23206 14.7899 3.81197 13.0657C3.42381 12.5944 3.22973 12.3588 3.22973 12C3.22973 11.6412 3.42381 11.4056 3.81197 10.9343C5.23206 9.21014 8.36427 6 12 6C15.6357 6 18.7679 9.21014 20.188 10.9343Z"/>
                                                </svg>
                                                <span>Просмотреть</span>
                                            </a>
                                            @can('update-thing', $thingParent->thing)
                                                <a class="dropdown__item" href="/things/{{ $thingParent->thing->id }}/edit">
                                                    <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M18 9.99982L14 5.99982M2.5 21.4998L5.88437 21.1238C6.29786 21.0778 6.5046 21.0549 6.69785 20.9923C6.86929 20.9368 7.03245 20.8584 7.18289 20.7592C7.35245 20.6474 7.49955 20.5003 7.79373 20.2061L21 6.99982C22.1046 5.89525 22.1046 4.10438 21 2.99981C19.8955 1.89525 18.1046 1.89524 17 2.99981L3.79373 16.2061C3.49955 16.5003 3.35246 16.6474 3.24064 16.8169C3.14143 16.9674 3.06301 17.1305 3.00751 17.302C2.94496 17.4952 2.92198 17.702 2.87604 18.1155L2.5 21.4998Z"/>
                                                    </svg>
                                                    <span>Редактировать</span>
                                                </a>
                                                <a class="dropdown__item" href="/things/{{ $thingParent->thing->id }}/delete">
                                                    <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M7 4C7 2.34315 8.34315 1 10 1H14C15.6569 1 17 2.34315 17 4V5H21C21.5523 5 22 5.44772 22 6C22 6.55228 21.5523 7 21 7H19.9394L19.1153 20.1871C19.0164 21.7682 17.7053 23 16.1211 23H7.8789C6.29471 23 4.98356 21.7682 4.88474 20.1871L4.06055 7H3C2.44772 7 2 6.55228 2 6C2 5.44772 2.44772 5 3 5H7V4ZM9 5H15V4C15 3.44772 14.5523 3 14 3H10C9.44772 3 9 3.44772 9 4V5ZM6.06445 7L6.88085 20.0624C6.91379 20.5894 7.35084 21 7.8789 21H16.1211C16.6492 21 17.0862 20.5894 17.1191 20.0624L17.9355 7H6.06445Z"/>
                                                    </svg>
                                                    <span>Удалить</span>
                                                </a>
                                                @if($thingParent->thing->owner)
                                                    <a class="dropdown__item" href="/things/{{ $thingParent->thing->id }}/free">
                                                        <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7 11C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H17C17.5523 13 18 12.5523 18 12C18 11.4477 17.5523 11 17 11H7Z" fill="currentColor"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1ZM3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12Z" fill="currentColor"/>
                                                        </svg>
                                                        <span>Отказаться</span>
                                                    </a>
                                                @endif
                                            @endcan
                                            @if(!$thingParent->thing->owner)
                                                <a class="dropdown__item" href="/things/{{ $thingParent->thing->id }}/use">
                                                    <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 6C12.5523 6 13 6.44772 13 7V11H17C17.5523 11 18 11.4477 18 12C18 12.5523 17.5523 13 17 13H13V17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17V13H7C6.44772 13 6 12.5523 6 12C6 11.4477 6.44772 11 7 11H11V7C11 6.44772 11.4477 6 12 6Z" fill="currentColor"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3Z" fill="currentColor"/>
                                                    </svg>
                                                    <span>Забрать</span>
                                                </a>
                                            @endif
                                            @can('move-thing', $thingParent->thing)
                                                <a class="dropdown__item" href="/things/{{ $thingParent->thing->id }}/move">
                                                    <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7 11C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H17C17.5523 13 18 12.5523 18 12C18 11.4477 17.5523 11 17 11H7Z" fill="currentColor"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1C5.92487 1 1 5.92487 1 12C1 18.0751 5.92487 23 12 23C18.0751 23 23 18.0751 23 12C23 5.92487 18.0751 1 12 1ZM3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12Z" fill="currentColor"/>
                                                    </svg>
                                                    <span>Удалить из места</span>
                                                </a>
                                            @endcan
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
