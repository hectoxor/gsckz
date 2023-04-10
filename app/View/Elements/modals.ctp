<!-- English form application -->
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
                <div class="container--column gap-24 pb-25">
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
<!-- Information form application -->
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
                <div class="container--column gap-24 pb-25">
                    <input class="input input-ico input-user-ico text text-type-medium" type="text" name="name" placeholder="Фамилия Имя" required />
                    <input class="input input-ico input-phone-ico text text-type-medium" type="text" name="phone" placeholder="Номер телефона" required />
                    <input class="input text-type-medium" type="text"  name="city" placeholder="Ваш город" required />
                    <div class="select-dropdown">
                        <select class="text text-type-medium" name="program" required>
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
<!-- Flash popup section -->

<span style="display:none;"><?= $flash_status = (isset($_SESSION['Message']['good'])) ? 2 : ((isset($_SESSION['Message']['bad'])) ? 1 : 0); ?></span>
<div id="flash-message-modal" class="modal" data-toggled="<?=($flash_status > 0) ? 'true' : 'false';?>">
    <div class="modal--overlay"></div>
    <div class="modal--body">
        <div class="modal--close">
            <div class="button button-ico border-circle" onclick="handleModalToggle('flash-message-modal');">
                <span class="ico ico-20">
                    <i class="ico-close"></i>
                </span>
            </div>
        </div>
        <div class="modal--content pb-20">
            <div class="modal--title">
                <?php if (isset($flash_status) && $flash_status == 2): ?>
                    <h3 class="text text-align-center">Спасибо за заявку!</h3>
                <?php elseif (isset($flash_status) && $flash_status == 1): ?>
                    <h3 class="text text-align-center">Что-то пошло не так!</h3>
                <?php endif; ?>
            </div>
            <span class="text text-type-medium text-align-center">
                <?php //var_dump($_SESSION); ?>
                <?php echo $this->Session->flash('good'); ?>
                <?php echo $this->Session->flash('bad'); ?>
            </span>
        </div>
    </div>
</div>