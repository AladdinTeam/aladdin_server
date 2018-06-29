@extends('layouts.app')
@section('title', 'Заказчикам')
@section('styles')
    <link href="{{asset('css/general.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    <link href="{{asset('css/styles.less')}}?v=001" type="text/css" rel="stylesheet/less"/>
    {{--<link href="{{asset('css/search.less')}}" type="text/css" rel="stylesheet/less"/>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.0/less.min.js" ></script>
@endsection
@section('body')
    <div class="first-block-customer">
        <div class="fifth-block-customer__container">
            <div class="row">
                <div class="col-12 col-md-6 align-self-center">
                    <img class="fifth-block-customer__img" src="{{asset('img/first_block-background.jpg')}}">
                </div>
                <div class="col-12 col-md-6">
                    <h3 class="fifth-block-customer__header">О сервисе</h3>
                    <p class="fifth-block-customer__text">Aladdin позволит быстро и бесплатно найти надежных исполнителей для решения бытовых задач. Просто опубликуйте задание и начните получать предложения от исполнителей, которые будут готовы его выполнить. Останется выбрать понравившегося исполнителя исходя из цены, отзывов или рейтинга, а также определится со способом оплаты: наличными или картой.</p>
                    <p class="fifth-block-customer__text">Каждый исполнитель Aladdin проходит процедуру верификации навыков. А возможность оплатить услуги после успешного завершения работ делает наш сервис по настоящему безопасным решением для заказчиков. </p>
                </div>
            </div>
        </div>
    </div>
    <div class="fourth-block">
        <div class="fourth-block__container">
            <h1 class="fourth-block__header">Найдите подходящего специалиста за <span class="fourth-block__header--blue">12 минут</span></h1>
            <div class="row rel-block">
                <div class="col-6">
                    <div class="list-block--bordered" style="margin-top: 10px">
                        <h2 class="list-block__header">1. Расскажите о задаче</h2>
                        <p class="list-block__text">Вкратце <a class="list-block__text--link" href="#">опишите</a> с какой проблемой или задачей вы столкнулись</p>
                    </div>
                </div>
                <div class="col-6">
                    <img class="list-block__img--2" src="{{asset('img/1.png')}}">
                </div>
                <div class="col-6" style="margin-top: 40px">
                    <img class="list-block__img--2--right" src="{{asset('img/2.png')}}">
                </div>
                <div class="col-6">
                    <div class="list-block--bordered">
                        <h2 class="list-block__header">2. Получите предложения</h2>
                        <p class="list-block__text">Задачу увидят все исполнители Aladdin и сразу же начнут предлагать свои цены и сроки.
                            <a class="list-block__text--link" href="#">Подробнее об исполнителях</a></p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="list-block--bordered">
                        <h2 class="list-block__header">3. Выберите подходящее</h2>
                        <p class="list-block__text">Выбирайте исходя из цены, рейтинга, отзывов или вашей интуиции.
                            Все исполнители <a class="list-block__text--link" href="#">проверены</a> и готовы к работе.</p>
                    </div>
                </div>
                <div class="col-6" style="margin-top: 20px">
                    <img class="list-block__img--2" src="{{asset('img/3.png')}}">
                </div>
                <div class="col-6" style="margin-top: 30px">
                    <img class="list-block__img--2--right" src="{{asset('img/2.png')}}">
                </div>
                <div class="col-6">
                    <div class="list-block--bordered">
                        <h2 class="list-block__header">4. Утвердите условия</h2>
                        <p class="list-block__text">После выбора исполнителя мы предоставим его контактный телефон для уточнения деталей</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="col-12 list-block--bordered">
                        <h2 class="list-block__header">5. Платите наличными или картой</h2>
                        <p class="list-block__text">Оплата по карте через <a class="list-block__text--link" href="#">безопасную сделку</a>
                            позволит вернуть деньги, если что-то пойдет не так, а также получить компенсацию</p>
                    </div>
                </div>
                <div class="col-6">
                    <img class="list-block__img--2" style="width: 150px; height: auto; margin-top: 20px" src="{{asset('img/5.png')}}">
                </div>
            </div>
            <div class="row list-block">
                <div class="col-12 list-block--bordered">
                    <h2 class="list-block__header">1. Расскажите о задаче</h2>
                    <p class="list-block__text">Вкратце <a class="list-block__text--link" href="#">опишите</a> с какой проблемой или задачей вы столкнулись</p>
                </div>
                <div class="col-6 list-block--fixed-height list-block--right-border"></div>
                <div class="col-12">
                    <img class="list-block__img" src="{{asset('img/fourth-block-1.png')}}">
                </div>
                <div class="col-6 list-block--fixed-height list-block--right-border"></div>
                <div class="col-12 list-block--bordered">
                    <h2 class="list-block__header">2. Получите предложения</h2>
                    <p class="list-block__text">Задачу увидят все исполнители Aladdin и сразу же начнут предлагать свои цены и сроки.
                        <a class="list-block__text--link" href="#">Подробнее об исполнителях</a></p>
                </div>
                <div class="col-6 list-block--fixed-height list-block--right-border"></div>
                <div class="col-12">
                    <img class="list-block__img" src="{{asset('img/fourth-block-2.png')}}">
                </div>
                <div class="col-6 list-block--fixed-height list-block--right-border"></div>
                <div class="col-12 list-block--bordered">
                    <h2 class="list-block__header">3. Выберите подходящее</h2>
                    <p class="list-block__text">Выбирайте исходя из цены, рейтинга, отзывов или вашей интуиции.
                        Все исполнители <a class="list-block__text--link" href="#">проверены</a> и готовы к работе.</p>
                </div>
                <div class="col-6 list-block--fixed-height list-block--right-border"></div>
                <div class="col-12">
                    <img class="list-block__img" src="{{asset('img/fourth-block-3.png')}}">
                </div>
                <div class="col-6 list-block--fixed-height list-block--right-border"></div>
                <div class="col-12 list-block--bordered">
                    <h2 class="list-block__header">4. Утвердите условия</h2>
                    <p class="list-block__text">После выбора исполнителя мы предоставим его контактный телефон для уточнения деталей</p>
                </div>
                <div class="col-6 list-block--fixed-height list-block--right-border"></div>
                <div class="col-12">
                    <img class="list-block__img" src="{{asset('img/fourth-block-4.png')}}">
                </div>
                <div class="col-6 list-block--fixed-height list-block--right-border"></div>
                <div class="col-12 list-block--bordered">
                    <h2 class="list-block__header">5. Платите наличными или картой</h2>
                    <p class="list-block__text">Оплата по карте через <a class="list-block__text--link" href="#">безопасную сделку</a>
                        позволит вернуть деньги, если что-то пойдет не так, а также получить компенсацию</p>
                </div>
                <div class="col-6 list-block--fixed-height list-block--right-border"></div>
                <div class="col-12">
                    <img class="list-block__img" src="{{asset('img/fourth-block-5.png')}}">
                </div>
            </div>
        </div>
    </div>
    <div class="why-block">
        <a href="{{url('/best_price#form')}}">
            <div class="why-block__container">
                <button class="button button--blue button--bordered button--big-font">Попробуйте, это бесплатно</button>
                {{--<h1 class="why-block__header why-block__header--one-header">Это удобно</h1>--}}
                {{--<p class="why-block__text">Aladdin позволит бесплатно найти надежных исполнителей для решения бытовых задач, а также оплатить услуги после успешного завершения работ</p>--}}
            </div>
        </a>
    </div>
    <div class="fourth-block">
        <div class="fourth-block__container" style="padding-bottom: 0">
            <div class="list list--customer">
                <div class="row">
                    <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                        <div class="row list__item">
                            <div class="col-2 col-sm-1 offset-sm-1 col-lg-1 offset-lg-2">
                                <img class="list__img" src="{{asset('img/fourth-block-2-1.png')}}">
                            </div>
                            <div class="col-10 col-sm-9 col-lg-7">
                                <h4 class="list__header list__header--customer">Ожидайте окончания сделки и убедитесь в качестве проведенных работ</h4>
                            </div>
                            <div class="col-12">
                                <p class="list__text list__text--customer">Как только заказчик подтверждает, что все услуги были предоставлены в соответствии с договоренностями, Aladdin переводит оплату на банковскую карту исполнителя.</p>
                            </div>
                        </div>
                        <div class="row list__item">
                            <div class="col-2 col-sm-1 offset-sm-1 col-lg-1 offset-lg-2">
                                <img class="list__img" src="{{asset('img/fourth-block-2-2.png')}}">
                            </div>
                            <div class="col-10 col-sm-9 col-lg-7">
                                <h4 class="list__header list__header--customer">Переведите деньги исполнителю или верните обратно на карту</h4>
                            </div>
                            <div class="col-12">
                                <p class="list__text list__text--customer">Если заказчик недоволен результатом работ, Aladdin возвращает деньги обратно на банковскую карту, а также выплачивает компенсацию до 7 000 рублей, если в результате действий исполнителя заказчику причинен материальный ущерб. <a href="#" class="list__text--allowed">Условия выплаты</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list list--customer2">
                <div class="row">
                    <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                        <div class="row list__item">
                            <div class="col-12">
                                <h4 class="list__header list__header--customer2">Ожидайте окончания сделки и убедитесь в качестве проведенных работ</h4>
                            </div>
                            <div class="col-12">
                                <p class="list__text list__text--customer2">Если заказчик считает, что задание выполнено некорректно, Aladdin проводит расследование, в котором анализируется изначальное предложение специалиста и фактические работы.</p>
                            </div>
                        </div>
                        <div class="row list__item">
                            <div class="col-12">
                                <h4 class="list__header list__header--customer2">Какая комиссия удерживается при оплате?</h4>
                            </div>
                            <div class="col-12">
                                <p class="list__text list__text--customer2">При оплате наличными какая-либо комиссия отсутствует. При оплате через безопасную сделку Aladdin взимает 1% комиссию от суммы сделки.</p>
                            </div>
                        </div>
                        <div class="row list__item">
                            <div class="col-12">
                                <h4 class="list__header list__header--customer2">Как получить компенсацию за материальный ущерб?</h4>
                            </div>
                            <div class="col-12">
                                <p class="list__text list__text--customer2">тобы получить выплату за материальный ущерб, пришлите заявку по адресу hi@vsealaddin.ru или позвоните по номеру 8(800)550 16 45 Задание должно соответствовать условиям компенсации.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fourth-block fourth-block--own-supplier">
        <div class="fourth-block__container">
            <h1 class="fourth-block__header fourth-block__header--larger">Наши испольнители</h1>
            <p class="fourth-block__subheader">Все специалисты проходят процедуру верификации, по окончанию которой мы определяем является ли исполнитель достойным кандидатом для предоставления услуг на Aladdin. Верификация включает в себя следующие проверки</p>
            <div class="list">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="row list__item">
                                    <div class="col-2 col-md-3 col-xl-2">
                                        <img class="list__img list__img--own-supplier" src="{{asset('img/fourth-block-2-1.png')}}">
                                    </div>
                                    <div class="col-10 col-md-9 col-xl-10">
                                        <h4 class="list__header list__header--own-supplier">Этикет и мотивация</h4>
                                        <p class="list__text">Проверка на знание сервисного этикета и оснований для достойной работы</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="row list__item">
                                    <div class="col-2 col-md-3 col-xl-2">
                                        <img class="list__img list__img--own-supplier" src="{{asset('img/fourth-block-2-2.png')}}">
                                    </div>
                                    <div class="col-10 col-md-9 col-xl-10">
                                        <h4 class="list__header list__header--own-supplier">Телефонное интервью</h4>
                                        <p class="list__text">Ответы на контрольные вопросы относительно вида деятельности</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="row list__item">
                                    <div class="col-2 col-md-3 col-xl-2">
                                        <img class="list__img list__img--own-supplier" src="{{asset('img/fourth-block-2-3.png')}}">
                                    </div>
                                    <div class="col-10 col-md-9 col-xl-10">
                                        <h4 class="list__header list__header--own-supplier">Загрузка документов</h4>
                                        <p class="list__text">Отправка паспортных данных, сертификатов, наград и информации с прошлых мест работы</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="row list__item">
                                    <div class="col-2 col-md-3 col-xl-2">
                                        <img class="list__img list__img--own-supplier" src="{{asset('img/fourth-block-2-4.png')}}">
                                    </div>
                                    <div class="col-10 col-md-9 col-xl-10">
                                        <h4 class="list__header list__header--own-supplier">Проверка истории работ</h4>
                                        <p class="list__text">Исследование отзывов прошлых заказчиков, период и интенсивность активности</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection