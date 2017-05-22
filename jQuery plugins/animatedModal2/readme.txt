Сегодня мы хотим поделиться скриптами модальных окон с красивыми эффектами. Различных вариаций очень много, так что каждый сможет найти своё.+

Идея в том, что модальное окошко нужно показать при клике на кнопку (элемент страницы); далее последует приятная анимация и собственно появляется окно.
На версиях iOS < 6 мобильной версии Safari, могут быть проблемы с отображением.
Структура модального окна делится на контейнер и контент:
01
<div class="md-modal md-effect-1" id="modal-1">
02
    <div class="md-content">
03
        <h3>Modal Dialog</h3>
04
        <div>
05
            <p>This is a modal window. You can do the following things with it:</p>
06
            <ul>
07
                <li><strong>Read:</strong> Modal windows will probably tell you something important so don't forget to read what it says.</li>
08
                <li><strong>Look:</strong> modal windows enjoy a certain kind of attention; just look at it and appreciate its presence.</li>
09
                <li><strong>Close:</strong> click on the button below to close the modal.</li>
10
            </ul>
11
            <button class="md-close">Close me!</button>
12
        </div>
13
    </div>
14
</div>
15
 
16
...
17
 
18
<div class="md-overlay"></div>
Основной контейнер будет отображаться или скрываться (используя класс “md-show”), а внутренний контент будет анимироваться. Оформляем окна следующими селекторами:
01
.md-modal {
02
    position: fixed;
03
    top: 50%;
04
    left: 50%;
05
    width: 50%;
06
    max-width: 630px;
07
    min-width: 320px;
08
    height: auto;
09
    z-index: 2000;
10
    visibility: hidden;
11
    backface-visibility: hidden;
12
    transform: translateX(-50%) translateY(-50%);
13
}
14
 
15
.md-show {
16
    visibility: visible;
17
}
18
 
19
.md-overlay {
20
    position: fixed;
21
    width: 100%;
22
    height: 100%;
23
    visibility: hidden;
24
    top: 0;
25
    left: 0;
26
    z-index: 1000;
27
    opacity: 0;
28
    background: rgba(143,27,15,0.8);
29
    transition: all 0.3s;
30
}
31
 
32
.md-show ~ .md-overlay {
33
    opacity: 1;
34
    visibility: visible;
35
}
Для некоторых эффектов добавим класс html элементам. В особенности для применения 3D эффектов. Заметьте это, что мы применяем всё это к всей странице и контенту:
01
.md-perspective,
02
.md-perspective body {
03
    height: 100%;
04
    overflow: hidden;
05
}
06
 
07
.md-perspective body  {
08
    background: #222;
09
    perspective: 600px;
10
}
11
 
12
.container {
13
    background: #e74c3c;
14
    min-height: 100%;
15
}
Для контроля различных эффектов, создадим специальные классы, ответственные за специфический эффект и анимацию. Пример индивидуального эффекта:
01
/* Effect 5: newspaper */
02
.md-show.md-effect-5 ~ .md-overlay {
03
    background: rgba(0,127,108,0.8);
04
}
05
 
06
.md-effect-5 .md-content {
07
    transform: scale(0) rotate(720deg);
08
    opacity: 0;
09
    transition: all 0.5s;
10
}
11
 
12
.md-show.md-effect-5 .md-content {
13
    transform: scale(1) rotate(0deg);
14
    opacity: 1;
15
}
У кнопок воспользуемся атрибутом data-* для того чтобы задать источник контента модального окна:
1
<button class="md-trigger" data-modal="modal-5">Newspaper</button>
