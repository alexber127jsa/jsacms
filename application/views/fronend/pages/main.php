<nav class="top-bar" data-topbar>
    <ul class="title-area">
        <li class="name">
            <h1><a href="/"><i class="fi-monitor"></i> JSAcms v0.1.0</a></h1>
        </li>
    </ul>

    <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
            <li><a href="/">ГЛАВНАЯ</a></li>
            <li><a href="/page/portfolio">ПОРТФОЛИО</a></li>
            <li><a href="/page/contacts">КОНТАКТЫ</a></li>
            <li class="has-dropdown">
                <a href="/page/buy">ЗАКАЗАТЬ</a>
                <ul class="dropdown">
                    <li><a href="/page/baysayt">ЗАКАЗАТЬ САЙТА</a></li>
                    <li><a href="/page/buymodule">ЗАКАЗАТЬ РАЗРАБОТКУ МОДУЛЯ</a></li>
                    <li><a href="/page/buytemplate">ЗАКАЗАТЬ ШАБЛОН САЙТА</a></li>
                    <li><a href="/page/buywidget">ЗАКАЗАТЬ ВИДЖЕТ</a></li>
                    <li><a href="/page/buycms">ЗАКАЗАТЬ ДВИЖОК</a></li>
                </ul>
            </li>
        </ul>
    </section>
</nav>
<div class="center">
    <hr />
    <ul class="small-block-grid-3">
        <li>
            <div class="panel">
                <ul class="pricing-table">
                    <li class="title">Визитка</li>
                    <li class="price">3000 р.</li>
                    <li class="description">Срок разработки 1 день.</li>
                    <li class="bullet-item"> + Оплата по факту.</li>
                    <li class="bullet-item"> + Базовое продвижение.</li>
                    <li class="bullet-item"> + Группа в ВК</li>
                    <li class="cta-button"><a class="button radius" href="#">Заказать сейчас</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="panel">
                <ul class="pricing-table">
                    <li class="title">Витрина</li>
                    <li class="price">5000 р.</li>
                    <li class="description">Срок разработки 3 дня</li>
                    <li class="bullet-item"> + Оплата по факту.</li>
                    <li class="bullet-item"> + Базовое продвижение.</li>
                    <li class="bullet-item"> + Группа в ВК</li>
                    <li class="cta-button"><a class="button radius" href="#">Заказать сейчас</a></li>
                </ul>
            </div>
        </li>
        <li>
            <div class="panel">
                <ul class="pricing-table">
                    <li class="title">Магазин</li>
                    <li class="price">10000 р.</li>
                    <li class="description">Срок разработки 7 дней</li>
                    <li class="bullet-item"> + Оплата по факту.</li>
                    <li class="bullet-item"> + Базовое продвижение.</li>
                    <li class="bullet-item"> + Группа в ВК</li>
                    <li class="cta-button"><a class="button radius" href="#">Заказать сейчас</a></li>
                </ul>
            </div>
        </li>
    </ul>
    <hr />
    <div class="panel">
        <label>top_menu</label>
        <hr />
        <?php
        echo '<pre>';
        print_r($main['top_menu']);
        echo '</pre>';
        ?>
    </div>
    <hr />
    <div class="panel">
        <label>last_news</label>
        <hr />
        <?php
        echo '<pre>';
        print_r($main['last_news']);
        echo '</pre>';
        ?>
    </div>
    <hr />
    <div class="panel">
        <label>last_articles</label>
        <hr />
        <?php
        echo '<pre>';
        print_r($main['last_articles']);
        echo '</pre>';
        ?>
    </div>
    <hr />
    <div class="panel">
        <label>cats_tree</label>
        <hr />
        <?php
        echo '<pre>';
        print_r($main['cats_tree']);
        echo '</pre>';
        ?>
    </div>
    <hr />
    <div class="panel">
        <label>last_items</label>
        <hr />
        <?php
        echo '<pre>';
        print_r($main['last_items']);
        echo '</pre>';
        ?>
    </div>
    <hr />
</div>