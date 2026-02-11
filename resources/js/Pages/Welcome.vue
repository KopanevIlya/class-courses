<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
  <Head title="CLASS – Фуллстек курс от преподавателя EasyUM" />

  <div class="min-h-screen flex flex-col bg-gradient-to-br from-blue-50 via-white to-blue-100 overflow-hidden relative">
    <!-- Header -->
    <header class="py-6 px-4 flex justify-between items-center max-w-7xl mx-auto w-full">
      <div class="text-2xl md:text-3xl font-extrabold text-blue-700 tracking-wide flex items-center gap-2 animate-fade-down">
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg" class="w-8 h-8" alt="CLASS" />
        CLASS – Фуллстек курс
      </div>
      <div>
        <Link v-if="canLogin" href="/login" class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition animate-fade-down animate-delay-200">Войти</Link>
      </div>
    </header>

    <!-- Hero Section -->
    <section class="flex flex-col md:flex-row items-center justify-center px-4 py-16 gap-10 max-w-7xl mx-auto w-full animate-fade-up">
      <div class="max-w-xl">
        <h1 class="text-4xl md:text-5xl font-extrabold text-blue-900 mb-6 leading-tight">
          CLASS — <span class="text-blue-600">Фуллстек обучение</span> с практикой
        </h1>
        <p class="text-blue-800 text-lg md:text-xl mb-8 font-medium">
          Овладейте современным фронтендом и бэкендом за 3 месяца.<br>
          Всё от HTML до Laravel и Vue — с живыми примерами и реальными проектами.
        </p>
        <div class="flex items-center gap-4 text-blue-700 mb-4">
          <span class="font-semibold">👨‍🏫 Преподаватель:</span>
          <span class="font-bold text-blue-900">EasyUM (опыт 10+ лет)</span>
        </div>
        <div class="flex flex-wrap gap-3 text-blue-500 font-semibold mb-3">
          <span class="bg-blue-100 rounded px-3 py-1 text-sm">HTML</span>
          <span class="bg-blue-100 rounded px-3 py-1 text-sm">CSS</span>
          <span class="bg-blue-100 rounded px-3 py-1 text-sm">JS</span>
          <span class="bg-blue-100 rounded px-3 py-1 text-sm">Vue</span>
          <span class="bg-blue-100 rounded px-3 py-1 text-sm">Laravel</span>
          <span class="bg-blue-100 rounded px-3 py-1 text-sm">PHP</span>
          <span class="bg-blue-100 rounded px-3 py-1 text-sm">MySQL</span>
        </div>
      </div>
      <div class="flex justify-center animate-float">
        <img src="https://it.easyum.ru/assets/img/hero-img.png"
             alt="CLASS Fullstack"
             class="w-64 md:w-80 rounded-2xl shadow-xl border-4 border-blue-200" />
      </div>
    </section>

    <!-- About Course -->
    <section class="max-w-5xl mx-auto px-4 py-8 bg-white rounded-2xl shadow-lg mt-8 animate-fade-up animate-delay-300">
      <h2 class="text-2xl font-bold text-blue-800 mb-4">Что вы получите?</h2>
      <ul class="list-disc pl-5 text-blue-700 text-lg space-y-2">
        <li>Понимание основ и продвинутых тем фронта и бэка</li>
        <li>Практика на реальных проектах</li>
        <li>Доступ к видеоурокам и интерактивным заданиям</li>
        <li>Обратная связь и личные консультации от преподавателя</li>
        <li>Готовое портфолио и помощь с трудоустройством</li>
      </ul>
    </section>

    <!-- Curriculum -->
    <section class="max-w-5xl mx-auto px-4 py-8 mt-10 animate-fade-up animate-delay-400">
      <h2 class="text-2xl font-bold text-blue-800 mb-4">Программа курса</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-blue-100 rounded-xl p-6 shadow flex flex-col gap-2">
          <h3 class="text-blue-700 font-semibold mb-2">Фронтенд</h3>
          <ul class="list-disc pl-5 text-blue-800">
            <li>HTML5, CSS3, адаптив</li>
            <li>JavaScript ES6+, SPA</li>
            <li>Vue.js (компоненты, state, роутинг)</li>
            <li>Интеграция с API</li>
            <li>UI/UX основы</li>
          </ul>
        </div>
        <div class="bg-blue-100 rounded-xl p-6 shadow flex flex-col gap-2">
          <h3 class="text-blue-700 font-semibold mb-2">Бэкенд</h3>
          <ul class="list-disc pl-5 text-blue-800">
            <li>PHP основы и ООП</li>
            <li>Laravel (MVC, миграции, REST API)</li>
            <li>MySQL (базы данных)</li>
            <li>JWT/Passport авторизация</li>
            <li>DevOps: деплой на сервер</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- About Teacher -->
    <section class="max-w-5xl mx-auto px-4 py-8 mt-10 bg-white rounded-2xl shadow-lg animate-fade-up animate-delay-500">
      <h2 class="text-2xl font-bold text-blue-800 mb-4">О преподавателе</h2>
      <div class="flex flex-col md:flex-row items-center gap-8">
        <img src="https://it.easyum.ru/assets/img/avatar.png"
             alt="EasyUM"
             class="w-32 h-32 rounded-full shadow border-2 border-blue-300 animate-fade-right" />
        <div>
          <p class="text-blue-700 text-lg mb-2 font-semibold">EasyUM — опыт 10+ лет в веб-разработке</p>
          <p class="text-blue-800 text-base">
            Работал в крупных IT-компаниях, веду проекты на Laravel, Vue, React и Node.  
            <br>Автор обучающих курсов и ментор студентов.  
            <br>Делаю обучение максимально практичным и понятным!
          </p>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section class="max-w-5xl mx-auto px-4 py-8 mt-10 animate-fade-up animate-delay-600">
      <h2 class="text-2xl font-bold text-blue-800 mb-4">Вопросы и ответы</h2>
      <div class="space-y-4">
        <div class="bg-blue-50 rounded-xl p-4 shadow">
          <h3 class="font-semibold text-blue-700 mb-1">Для кого этот курс?</h3>
          <p class="text-blue-800">Для начинающих и тех, кто хочет освоить фуллстек и работать в IT.</p>
        </div>
        <div class="bg-blue-50 rounded-xl p-4 shadow">
          <h3 class="font-semibold text-blue-700 mb-1">Какие проекты будем делать?</h3>
          <p class="text-blue-800">Сайт портфолио, интернет-магазин, REST API, SPA-приложения.</p>
        </div>
        <div class="bg-blue-50 rounded-xl p-4 shadow">
          <h3 class="font-semibold text-blue-700 mb-1">Есть ли поддержка?</h3>
          <p class="text-blue-800">Да, личные консультации и чат для вопросов.</p>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="mt-auto py-6 px-4 bg-blue-600 text-white text-center animate-fade-up animate-delay-700">
      <div>
        Laravel {{ laravelVersion }} | PHP {{ phpVersion }} &nbsp; | &nbsp; CLASS © 2024
      </div>
      <div class="mt-2">
        <a href="https://it.easyum.ru/" target="_blank" class="underline hover:text-blue-200">Наш сайт</a>
        &nbsp;|&nbsp;
        <a href="mailto:info@easyum.ru" class="underline hover:text-blue-200">Контакты</a>
      </div>
    </footer>
  </div>
</template>

<style scoped>
@keyframes fade-up {
  0% { opacity: 0; transform: translateY(40px);}
  100% { opacity: 1; transform: translateY(0);}
}
@keyframes fade-down {
  0% { opacity: 0; transform: translateY(-40px);}
  100% { opacity: 1; transform: translateY(0);}
}
@keyframes fade-right {
  0% { opacity: 0; transform: translateX(-40px);}
  100% { opacity: 1; transform: translateX(0);}
}
@keyframes float {
  0%, 100% { transform: translateY(0);}
  50% { transform: translateY(-20px);}
}
.animate-fade-up { animation: fade-up 1s cubic-bezier(.68,-0.55,.27,1.55) both;}
.animate-fade-down { animation: fade-down 1s cubic-bezier(.68,-0.55,.27,1.55) both;}
.animate-fade-right { animation: fade-right 1s cubic-bezier(.68,-0.55,.27,1.55) both;}
.animate-float { animation: float 3s ease-in-out infinite;}
.animate-delay-200 { animation-delay: .2s;}
.animate-delay-300 { animation-delay: .3s;}
.animate-delay-400 { animation-delay: .4s;}
.animate-delay-500 { animation-delay: .5s;}
.animate-delay-600 { animation-delay: .6s;}
.animate-delay-700 { animation-delay: .7s;}
</style>