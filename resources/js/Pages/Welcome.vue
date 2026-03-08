<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';

defineProps({
    canLogin: Boolean,
});

// Счетчик до окончания акции
const deadline = new Date('2026-04-01T00:00:00');
const timer = ref({ days: 0, hours: 0, minutes: 0, seconds: 0 });

function updateTimer() {
    const now = new Date();
    const diff = deadline - now;
    if (diff > 0) {
        timer.value.days = Math.floor(diff / (1000 * 60 * 60 * 24));
        timer.value.hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
        timer.value.minutes = Math.floor((diff / (1000 * 60)) % 60);
        timer.value.seconds = Math.floor((diff / 1000) % 60);
    } else {
        timer.value.days = timer.value.hours = timer.value.minutes = timer.value.seconds = 0;
    }
}

let interval;
onMounted(() => {
    updateTimer();
    interval = setInterval(updateTimer, 1000);
});
onUnmounted(() => {
    clearInterval(interval);
});
</script>

<template>
  <Head title="CLASS courses" />

  <div class="min-h-screen flex flex-col bg-gradient-to-br from-blue-50 via-white to-blue-100 overflow-hidden relative">
    <!-- Animated Background -->
    <div class="absolute inset-0 z-0 pointer-events-none">
      <div class="absolute top-[-80px] left-[-100px] w-[400px] h-[400px] bg-blue-200 opacity-30 rounded-full blur-[100px] animate-bg-move-1"></div>
      <div class="absolute right-[-120px] top-[120px] w-[350px] h-[350px] bg-blue-300 opacity-20 rounded-full blur-[80px] animate-bg-move-2"></div>
      <div class="absolute left-[40vw] bottom-[50px] w-[300px] h-[300px] bg-blue-400 opacity-15 rounded-full blur-[80px] animate-bg-move-3"></div>
      <svg class="absolute bottom-0 left-0 w-full h-32" viewBox="0 0 1440 320">
        <path class="animate-wave" fill="#3b82f6" fill-opacity="0.1"
              d="M0,160L60,186.7C120,213,240,267,360,272C480,277,600,235,720,208C840,181,960,171,1080,154.7C1200,139,1320,117,1380,106.7L1440,96V320H0Z"></path>
      </svg>
    </div>

    <!-- Header -->
    <header class="relative z-10 py-6 px-4 flex justify-between items-center max-w-7xl mx-auto w-full">
  <div class="text-2xl md:text-3xl font-extrabold text-blue-700 tracking-wide flex items-center gap-2 animate-slide-down">
    <img src="../../../public/img/logo.png" style="height: 70px;" alt="CLASS" />
  </div>
  <div class="flex items-center gap-4">
    <!-- Ссылка на Телеграм -->
    <a href="https://t.me/Kopanev_Ilya" target="_blank" rel="noopener" title="Телеграм">
      <svg width="28" height="28" viewBox="0 0 24 24" fill="#229ED9" xmlns="http://www.w3.org/2000/svg">
        <path d="M9.993 16.753l-.396 5.59c.57 0 .817-.246 1.116-.542l2.676-2.563 5.552 4.06c1.016.562 1.74.267 2.013-.942l3.652-17.13c.342-1.562-.565-2.175-1.572-1.797l-21.06 8.11c-1.437.553-1.417 1.345-.26 1.71l5.392 1.684 12.507-7.89c.59-.354 1.13-.158.687.196l-10.13 8.24z"/>
      </svg>
    </a>
    <!-- Кнопка Войти -->
    <Link v-if="canLogin" href="/login" class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition animate-slide-down animate-delay-100">Войти</Link>
  </div>
</header>

    <!-- Hero Section -->
    <section class="relative z-10 flex flex-col md:flex-row items-center justify-center px-4 py-16 gap-10 max-w-7xl mx-auto w-full animate-fade-up">
      <div class="max-w-xl">
        <h1 class="text-4xl md:text-5xl font-extrabold text-blue-900 mb-6 leading-tight animate-slide-right">
          CLASS — <span class="text-blue-600">курс фуллстек-разработки</span> нового поколения
        </h1>
        <p class="text-blue-800 text-lg md:text-xl mb-8 font-medium animate-fade-up animate-delay-200">
          Стань тем, кто создает будущее!<br>
          CLASS — это не просто обучение, а твой старт в IT, где ты получаешь <b>знания, опыт и поддержку</b>.
        </p>
        <div class="flex items-center gap-4 text-blue-700 mb-4 animate-fade-up animate-delay-300">
          <span class="font-semibold">👨‍🏫 Преподаватель:</span>
          <span class="font-bold text-blue-900">Копанев Илья</span>
        </div>
        <div class="flex flex-wrap gap-3 text-blue-500 font-semibold mb-3 animate-fade-up animate-delay-400">
          <span class="bg-blue-100 rounded px-3 py-1 text-sm">Фронтенд</span>
          <span class="bg-blue-100 rounded px-3 py-1 text-sm">Бэкенд</span>
          <span class="bg-blue-100 rounded px-3 py-1 text-sm">Чаты поддержки</span>
          <span class="bg-blue-100 rounded px-3 py-1 text-sm">Практика</span>
          <span class="bg-blue-100 rounded px-3 py-1 text-sm">Общение</span>
        </div>
        <div class="mt-8 text-blue-900 font-bold text-xl animate-scale-in">
          <span>Твой путь в IT начинается здесь!</span>
        </div>
      </div>
      <div class="flex justify-center animate-float animate-delay-300">
        <img src="../../../public/img/Class.png"
             alt="CLASS Fullstack"
             class="w-64 md:w-80 rounded-2xl shadow-xl border-4 border-blue-200" />
      </div>
    </section>

    <!-- About Course -->
    <section class="relative z-10 max-w-5xl mx-auto px-4 py-8 bg-white rounded-2xl shadow-lg mt-8 animate-fade-up animate-delay-500">
      <h2 class="text-2xl font-bold text-blue-800 mb-4 animate-slide-right">Почему CLASS?</h2>
      <ul class="list-disc pl-5 text-blue-700 text-lg space-y-2 animate-fade-up animate-delay-600">
        <li>CLASS — это <b>больше, чем курс</b>. Это сообщество, поддержка и личное развитие.</li>
        <li>Фуллстек: освоишь и фронт, и бэк, и сможешь работать над любыми проектами.</li>
        <li>Практика с реальными заданиями, а не просто теория.</li>
        <li>Внутренние чаты для поддержки, общения и обмена опытом.</li>
        <li>Личное сопровождение от преподавателя на каждом этапе обучения.</li>
        <li>Портфолио, которое выделит тебя среди других кандидатов.</li>
        <li>Возможность работать удалённо или в офисе, в любой стране.</li>
        <li>Ты получишь уверенность, знания и навыки, которые ценятся работодателями.</li>
        <li>В CLASS ты не просто учишься — ты становишься частью IT!</li>
      </ul>
      <div class="mt-8 text-blue-800 text-xl font-semibold animate-fade-up animate-delay-700">
        <span>Внутренние чаты поддержки и общения доступны после входа.</span>
      </div>
    </section>


        <!-- HOW IT WORKS: Как проходит обучение -->
        <section class="relative z-10 max-w-5xl mx-auto px-4 py-8 mt-10 bg-blue-50 rounded-2xl shadow-lg animate-fade-up animate-delay-600">
      <h2 class="text-2xl font-bold text-blue-800 mb-4 animate-slide-left">Как проходит обучение</h2>
      <ul class="list-disc pl-5 text-blue-700 text-lg space-y-2 animate-fade-up animate-delay-700">
        <li>Все занятия проходят <b>онлайн</b> в формате видеоконференций.</li>
        <li>После каждого занятия <b>запись урока выкладывается на платформу</b>, доступна для просмотра в любое время.</li>
        <li>Платформа с материалами, домашними заданиями и чатами для поддержки.</li>
        <li>Можно учиться в удобном темпе, возвращаться к урокам и пересматривать их.</li>
        <li>Обратная связь и разбор задач в прямом эфире и в чате.</li>
      </ul>
      <div class="mt-6 text-blue-900 text-lg font-semibold animate-fade-up animate-delay-800">
        <span>Пропустил занятие? Не проблема — все записи доступны!</span>
      </div>
    </section>

<!-- PRICE BLOCK: Цена курса -->
<section class="relative z-10 max-w-5xl mx-auto px-4 py-8 mt-10 bg-white rounded-2xl shadow-lg">
  <h2 class="text-2xl font-bold text-blue-800 mb-4">Цена курса</h2>
  <div class="flex flex-col md:flex-row items-center gap-8">
    <div class="flex-1">
      <div class="text-blue-900 text-xl font-semibold mb-2">
        Курс состоит из <b>30 занятий</b> с практикой и поддержкой.
      </div>
      <div class="text-blue-700 text-lg mb-4">
        <span class="bg-blue-100 px-3 py-1 rounded font-bold text-blue-900">Сейчас действует скидка!</span>
      </div>
      <div class="text-2xl font-bold mb-2">
        <span class="text-blue-600">35 000 руб.</span>
        <span class="text-blue-400 line-through ml-3 text-xl">45 000 руб.</span>
      </div>
      <div class="text-blue-800 text-base mb-4">В рассрочку или единоразово.</div>
    </div>
    <div class="flex-1 flex flex-col items-center">
      <div class="text-blue-700 text-lg mb-2 font-semibold">До конца акции осталось:</div>
      <div class="flex gap-2 text-2xl font-bold text-blue-900 bg-blue-100 rounded-xl px-6 py-3">
  <span class="w-16 text-center font-mono">{{ timer.days }}д</span>
  <span>:</span>
  <span class="w-12 text-center font-mono">{{ timer.hours }}ч</span>
  <span>:</span>
  <span class="w-12 text-center font-mono">{{ timer.minutes }}м</span>
  <span>:</span>
  <span class="w-12 text-center font-mono">{{ timer.seconds }}с</span>
</div>
      <div class="mt-2 text-blue-600 text-sm">Акция действует до 1 апреля 2026 года</div>
    </div>
  </div>
</section>

    <!-- Curriculum -->
    <section class="relative z-10 max-w-5xl mx-auto px-4 py-8 mt-10 animate-fade-up animate-delay-700">
      <h2 class="text-2xl font-bold text-blue-800 mb-4 animate-slide-left">Программа курса</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-blue-100 rounded-xl p-6 shadow flex flex-col gap-2 animate-scale-in">
          <h3 class="text-blue-700 font-semibold mb-2">Фронтенд</h3>
          <ul class="list-disc pl-5 text-blue-800">
            <li>Основы веба: верстка, стилизация, адаптивность</li>
            <li>JavaScript: логика, интерактивность, динамика</li>
            <li>Современные фреймворки: компоненты, SPA</li>
            <li>Работа с API, интеграция с сервером</li>
            <li>UI/UX: как делать удобно и красиво</li>
          </ul>
        </div>
        <div class="bg-blue-100 rounded-xl p-6 shadow flex flex-col gap-2 animate-scale-in animate-delay-100">
          <h3 class="text-blue-700 font-semibold mb-2">Бэкенд</h3>
          <ul class="list-disc pl-5 text-blue-800">
            <li>Основы серверной разработки</li>
            <li>Работа с базами данных</li>
            <li>Создание REST API</li>
            <li>Авторизация и безопасность</li>
            <li>Деплой и поддержка проектов</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- Advertising / Motivation Block -->
    <section class="relative z-10 max-w-5xl mx-auto px-4 py-8 mt-10 bg-white rounded-2xl shadow-lg animate-fade-up animate-delay-800">
      <h2 class="text-2xl font-bold text-blue-800 mb-4 animate-slide-right">Что ты сможешь после курса?</h2>
      <div class="space-y-4 text-blue-700 text-lg animate-fade-up animate-delay-900">
        <div>✔️ Создавать сайты и приложения, которые реально работают и приносят пользу</div>
        <div>✔️ Понимать, как устроен интернет и современные технологии</div>
        <div>✔️ Работать на себя или в IT-компании, получать достойную оплату</div>
        <div>✔️ Самостоятельно решать задачи, учиться новому и развиваться</div>
        <div>✔️ Общаться с единомышленниками, получать поддержку и советы</div>
        <div>✔️ Стать частью профессии, которая востребована и будет актуальна ещё много лет</div>
        <div>✔️ Начать новую жизнь, где ты управляешь своим временем и успехом!</div>
      </div>
      <div class="mt-8 text-blue-900 font-bold text-xl animate-fade-up animate-delay-1000">
        <span>CLASS — твой шанс стать IT-специалистом.</span>
      </div>
    </section>

    <!-- Fake Reviews -->
    <section class="relative z-10 max-w-5xl mx-auto px-4 py-8 mt-10 animate-fade-up animate-delay-900">
      <h2 class="text-2xl font-bold text-blue-800 mb-6 animate-slide-left">Отзывы студентов</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <div class="bg-blue-50 rounded-2xl shadow p-6 flex flex-col items-center animate-fade-up animate-delay-1100">
          <img src="../../../public/img/_6645e13e1e998.jpg" class="w-16 h-16 rounded-full mb-4 border-2 border-blue-200" alt="review1" />
          <div class="text-blue-700 font-bold mb-2">Алексей, 27 лет</div>
          <div class="text-blue-800 text-base text-center">"CLASS изменил мою жизнь. Теперь я работаю в IT и могу реализовать свои идеи!"</div>
        </div>
        <div class="bg-blue-50 rounded-2xl shadow p-6 flex flex-col items-center animate-fade-up animate-delay-1200">
          <img src="../../../public/img/_6480216064b84.jpg" class="w-16 h-16 rounded-full mb-4 border-2 border-blue-200" alt="review2" />
          <div class="text-blue-700 font-bold mb-2">Марина, 34 года</div>
          <div class="text-blue-800 text-base text-center">"Очень крутая атмосфера и поддержка! Даже сложные темы стали понятными."</div>
        </div>
        <div class="bg-blue-50 rounded-2xl shadow p-6 flex flex-col items-center animate-fade-up animate-delay-1300">
          <img src="../../../public/img/333555.webp" class="w-16 h-16 rounded-full mb-4 border-2 border-blue-200" alt="review3" />
          <div class="text-blue-700 font-bold mb-2">Дмитрий, 26 лет</div>
          <div class="text-blue-800 text-base text-center">"После CLASS я смог сделать свой первый проект и устроиться на работу!"</div>
        </div>
      </div>
    </section>

    <!-- About Teacher -->
    <section class="relative z-10 max-w-5xl mx-auto px-4 py-8 mt-10 bg-white rounded-2xl shadow-lg animate-fade-up animate-delay-1000">
      <h2 class="text-2xl font-bold text-blue-800 mb-4 animate-slide-right">О преподавателе</h2>
      <div class="flex flex-col md:flex-row items-center gap-8">
        <img src="../../../public/img/DSC-206.JPG"
             alt="Копанев Илья"
             class="w-32 h-32 rounded-full shadow border-2 border-blue-300 animate-fade-right" />
        <div>
          <p class="text-blue-700 text-lg mb-2 font-semibold">Копанев Илья — ваш личный наставник</p>
          <p class="text-blue-800 text-base">
            Более 10 лет в веб-разработке, сотни реализованных проектов, десятки обученных студентов.<br>
            Я лично отвечаю на ваши вопросы, поддерживаю и помогаю разобраться даже в самых сложных темах.<br>
            CLASS — это не просто курс, это путь к новой профессии и уверенности в себе!
          </p>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section class="relative z-10 max-w-5xl mx-auto px-4 py-8 mt-10 animate-fade-up animate-delay-1100">
      <h2 class="text-2xl font-bold text-blue-800 mb-4 animate-slide-left">Вопросы и ответы</h2>
      <div class="space-y-4">
        <div class="bg-blue-50 rounded-xl p-4 shadow animate-fade-up animate-delay-1200">
          <h3 class="font-semibold text-blue-700 mb-1">Нужны ли специальные знания?</h3>
          <p class="text-blue-800">Нет! Всё объясняется с нуля. Главное — желание учиться и развиваться.</p>
        </div>
        <div class="bg-blue-50 rounded-xl p-4 shadow animate-fade-up animate-delay-1300">
          <h3 class="font-semibold text-blue-700 mb-1">Как проходит обучение?</h3>
          <p class="text-blue-800">
            Все занятия проходят онлайн, после каждого урока запись выкладывается на платформу.<br>
            Практические задания, поддержка и чаты доступны для всех участников.
          </p>
        </div>
        <div class="bg-blue-50 rounded-xl p-4 shadow animate-fade-up animate-delay-1400">
          <h3 class="font-semibold text-blue-700 mb-1">Что если возникнут вопросы?</h3>
          <p class="text-blue-800">Всегда можно обратиться ко мне напрямую или в чат поддержки.</p>
        </div>
        <div class="bg-blue-50 rounded-xl p-4 shadow animate-fade-up animate-delay-1500">
          <h3 class="font-semibold text-blue-700 mb-1">Какие проекты будем делать?</h3>
          <p class="text-blue-800">Портфолио, интернет-магазин, чат, REST API, и многое другое.</p>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="relative z-10 mt-auto py-6 px-4 bg-blue-600 text-white text-center animate-fade-up animate-delay-1600">
  <div>
    CLASS © 2026 
  </div>
  <div class="mt-2">
    <span>Внутренние чаты поддержки и общения доступны после входа</span>
  </div>
  <div class="mt-2">
    <a href="/offer" target="_blank" rel="noopener" class="underline text-blue-200 hover:text-white">
  Публичный договор (оферта)
</a>
  </div>
</footer>
  </div>
</template>

<style scoped>
/* Background animation */
@keyframes bg-move-1 {
  0%, 100% { transform: translateY(0) translateX(0);}
  50% { transform: translateY(40px) translateX(60px);}
}
@keyframes bg-move-2 {
  0%, 100% { transform: translateY(0) translateX(0);}
  50% { transform: translateY(-30px) translateX(-40px);}
}
@keyframes bg-move-3 {
  0%, 100% { transform: translateY(0) translateX(0);}
  50% { transform: translateY(30px) translateX(20px);}
}
.animate-bg-move-1 { animation: bg-move-1 8s ease-in-out infinite; }
.animate-bg-move-2 { animation: bg-move-2 10s ease-in-out infinite; }
.animate-bg-move-3 { animation: bg-move-3 12s ease-in-out infinite; }

/* Wave animation */
@keyframes wave {
  0%,100% { transform: translateX(0);}
  50% { transform: translateX(-20px);}
}
.animate-wave { animation: wave 6s ease-in-out infinite; }

/* Block animations */
@keyframes fade-up {
  0% { opacity: 0; transform: translateY(40px);}
  100% { opacity: 1; transform: translateY(0);}
}
@keyframes fade-right {
  0% { opacity: 0; transform: translateX(-40px);}
  100% { opacity: 1; transform: translateX(0);}
}
@keyframes fade-left {
  0% { opacity: 0; transform: translateX(40px);}
  100% { opacity: 1; transform: translateX(0);}
}
@keyframes slide-down {
  0% { opacity: 0; transform: translateY(-80px);}
  100% { opacity: 1; transform: translateY(0);}
}
@keyframes slide-right {
  0% { opacity: 0; transform: translateX(-80px);}
  100% { opacity: 1; transform: translateX(0);}
}
@keyframes slide-left {
  0% { opacity: 0; transform: translateX(80px);}
  100% { opacity: 1; transform: translateX(0);}
}
@keyframes scale-in {
  0% { opacity: 0; transform: scale(0.85);}
  100% { opacity: 1; transform: scale(1);}
}
@keyframes float {
  0%, 100% { transform: translateY(0);}
  50% { transform: translateY(-20px);}
}
.animate-fade-up { animation: fade-up 1s cubic-bezier(.68,-0.55,.27,1.55) both;}
.animate-fade-right { animation: fade-right 1s cubic-bezier(.68,-0.55,.27,1.55) both;}
.animate-fade-left { animation: fade-left 1s cubic-bezier(.68,-0.55,.27,1.55) both;}
.animate-slide-down { animation: slide-down 1s cubic-bezier(.68,-0.55,.27,1.55) both;}
.animate-slide-right { animation: slide-right 1s cubic-bezier(.68,-0.55,.27,1.55) both;}
.animate-slide-left { animation: slide-left 1s cubic-bezier(.68,-0.55,.27,1.55) both;}
.animate-scale-in { animation: scale-in 1s cubic-bezier(.68,-0.55,.27,1.55) both;}
.animate-float { animation: float 3s ease-in-out infinite;}
/* Animation delays */
.animate-delay-100 { animation-delay: .1s;}
.animate-delay-200 { animation-delay: .2s;}
.animate-delay-300 { animation-delay: .3s;}
.animate-delay-400 { animation-delay: .4s;}
.animate-delay-500 { animation-delay: .5s;}
.animate-delay-600 { animation-delay: .6s;}
.animate-delay-700 { animation-delay: .7s;}
.animate-delay-800 { animation-delay: .8s;}
.animate-delay-900 { animation-delay: .9s;}
.animate-delay-1000 { animation-delay: 1s;}
.animate-delay-1100 { animation-delay: 1.1s;}
.animate-delay-1200 { animation-delay: 1.2s;}
.animate-delay-1300 { animation-delay: 1.3s;}
.animate-delay-1400 { animation-delay: 1.4s;}
.animate-delay-1500 { animation-delay: 1.5s;}
.animate-delay-1600 { animation-delay: 1.6s;}
</style>