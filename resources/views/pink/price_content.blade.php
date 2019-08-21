@if (count($errors) > 0)
    <div class="box error-box">

        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach

    </div>
@endif

@if (session('status'))
    <div class="box success-box">
        {{ session('status') }}
    </div>
@endif

<div id="content-page" class="content group">
    <div class="hentry group">
       <table class = "table table-striped table-bordered">
           <thead><tr><td></td> <td style="width: 30%; text-align: right">Цена, тг.</td> </tr></thead>
           <tbody>

           <tr><td>Создание информационной видеорекламы для трансляции на телевидении на двух языках из материалов Заказчика до 30 секунд
                   Ролик делается удаленно (без встречи с клиентом, все передачи материалов. Утверждение по e-mail, skype, whatsup и др)
                   <a href="/portfolio/category/information">Примеры</a>
               </td>
               <td class="td__right">
                   75 000 тг
               </td>
           </tr>
           <tr><td>Создание информационной видеорекламы для трансляции на телевидении на двух языках из материалов Заказчика, а также со съмочной работой нашей студии на территории
                   Заказчика, без организации постановочных съемок с минимальной режиссерской работой, без участия актеров до 30 секунд.

                   <a href="/portfolio/category/information_shooting">Примеры</a>
               </td>
               <td class="td__right">
                   90 000 тг
               </td>
           </tr>
           <tr><td>Создание имиджевой видеорекламы с участием актеров и постановочной съемкой.
                   Указана стоимость работ по съемке и монтажу. Гонорары актеров, аренда локаций, музыкальное оформление и прочие расходы оплачиваются дополнительно согласно расчету.
                   <a href="/portfolio/category/shooting_actors">Примеры</a>
               </td>
               <td class="td__right">
                   120 000 тг
               </td>
           </tr>
           <tr><td>Мультфильм. Персонажная 2D анимация
                   <a href="/portfolio/category/anamation_2d">Примеры</a>
               </td>
               <td class="td__right">
                   от 150 000 тг
               </td>
           </tr>
           <tr><td>Мультфильм. Персонажная 3D анимация
                   <a href="/portfolio/category/anamation_3d">Примеры</a>
               </td>
               <td class="td__right">
                   от 250 000 тг
               </td>
           </tr>
           <tr><td>Проморолики

                   <a href="/portfolio/category/promo">Примеры</a>
               </td>
               <td class="td__right">
                   от 90 000 тг
               </td>
           </tr>
           <tr><td>Изготовление радиоролика на русском и казахском языках по 1 одному голосу на русском и казахском и музыкальная подложка
                   <a href="/portfolio/category/radio">Примеры</a>
               </td>
               <td class="td__right">
                   20 000 тг
               </td>
           </tr>
           <tr><td>Изготовление ТВ баннера
                   <a href="/portfolio">Примеры</a>
               </td>
               <td class="td__right">
                   15 000 тг
               </td>
           </tr>
           <tr><td>Изготовление видеорекламы для LED дисплеев (без звука) 10-30 сек
                   <a href="/portfolio">Примеры</a>
               </td>
               <td class="td__right">
                   50 000 тг
               </td>
           </tr>
           </tbody>
       </table>
    </div>
    <!-- START COMMENTS -->
    <div id="comments">
    </div>
    <!-- END COMMENTS -->
</div>