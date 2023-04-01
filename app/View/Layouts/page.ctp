<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title><?=$title_for_layout?></title>
        <?php if(isset($meta['keywords'])): ?>
            <?php echo $this->Html->meta('keywords', $meta['keywords']); ?>
        <?php endif; ?>
        <?php if(isset($meta['description'])): ?>
            <?php echo $this->Html->meta('description', $meta['description']); ?>
        <?php endif; ?>

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <?php
            echo $this->Html->meta(
                'favicon.ico',
                '/favicon.svg?v=1.1',
                array('type' => 'icon')
            );
        ?>

        <meta name="yandex-verification" content="c621412cfdb56acc" />
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156557152-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-156557152-1');
        </script>
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
           (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
           m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
           (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

           ym(57106423, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true
           });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/57106423" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
        <script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit" async defer></script>

        <link rel="stylesheet" href="/css/style.css" />

        <?php
            echo $this->Html->script(
                array('jquery-3.0.0.min', 'index'),
                array('defer' => true)
            );
        ?>
    </head>

    <body class="container--column gap-24">
        <?php echo $this->element('navbar') ?>
        
        <?php echo $this->fetch('content') ?>

        <?php echo $this->element('footer') ?>
        <div id="english-school-apply-modal" class="modal" data-toggled="false">
            <div class="modal--overlay"></div>
            <div class="modal--body">
                <div class="modal--close">
                    <div class="button button-ico border-circle" onclick="handleModalToggle('english-school-apply-modal');">
                        <span class="ico ico-20">
                            <i class="ico-close"></i>
                        </span>
                    </div>
                </div>
                <div class="modal--content">
                    <div class="modal--title container--column gap-0">
                        <h3 class="text text-align-center">Языковая школа</h3>
                    </div>
                    <form class="w-100" method="post" action="/requests">
                        <div class="container--column pb-25">
                            <input class="input input-ico input-user-ico text text-type-medium" type="text" name="name" placeholder="Фамилия Имя" required />
                            <input class="input input-ico input-phone-ico text text-type-medium" type="text" name="phone" placeholder="Номер телефона" required />
                            <button class="button button-primary button-unset" type="submit">
                                <span class="text text-type-medium-14 text-color-white text-font-weight-500 text-transform-uppercase">
                                    Отправить
                                </span>
                            </button>
                            <div class="container--column gap-0">
                                <span class="text text-type-small text-align-center">
                                    Оставляя сообщение вы соглашаетесь
                                </span>
                                <span class="text text-type-small text-align-center">
                                    на обработку 
                                    <a href="/" class="text text-type-small text-color-primary">
                                        персональных данных
                                    </a>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="apply-modal" class="modal" data-toggled="false">
            <div class="modal--overlay"></div>
            <div class="modal--body">
                <div class="modal--close">
                    <div class="button button-ico border-circle" onclick="handleModalToggle('apply-modal');">
                        <span class="ico ico-20">
                            <i class="ico-close"></i>
                        </span>
                    </div>
                </div>
                <div class="modal--content">
                    <div class="modal--title container--column gap-0">
                        <h3 class="text text-align-center">Образование за</h3>
                        <h3 class="text text-align-center">pубежом</h3>
                    </div>
                    <form class="w-100" method="post" action="/requests">
                        <div class="container--column pb-25">
                            <input class="input input-ico input-user-ico text text-type-medium" type="text" name="name" placeholder="Фамилия Имя" required />
                            <input class="input input-ico input-phone-ico text text-type-medium" type="text" name="phone" placeholder="Номер телефона" required />
                            <input class="input text-type-medium" type="text"  name="city" placeholder="Ваш город" required />
                            <div class="select-dropdown">
                                <select class="text text-type-medium" required>
                                    <option value="" disabled selected hidden>Выберите программу</option>
                                    <option value="Бакалавриат">Бакалавриат</option>
                                    <option value="Магистратура">Магистратура</option>
                                    <option value="Языковые курсы">Языковые курсы</option>
                                    <option value="Летние каникулы за рубежом">Летние каникулы за рубежом</option>
                                </select>
                            </div>
                            <button class="button button-primary button-unset" type="submit">
                                <span class="text text-type-medium-14 text-color-white text-font-weight-500 text-transform-uppercase">
                                    Отправить заявку
                                </span>
                            </button>
                            <div class="container--column gap-0">
                                <span class="text text-type-small text-align-center">
                                    Оставляя сообщение вы соглашаетесь
                                </span>
                                <span class="text text-type-small text-align-center">
                                    на обработку 
                                    <a href="/" class="text text-type-small text-color-primary">
                                        персональных данных
                                    </a>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- https://book.cakephp.org/2/en/core-libraries/helpers/js.html -->
        <?php echo $this->Js->writeBuffer(); ?>
    </body>
</html>