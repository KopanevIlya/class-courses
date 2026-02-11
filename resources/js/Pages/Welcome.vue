<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
});
</script>

<template>
  <Head title="CLASS – Фуллстек курс от Копанева Ильи" />

  <div class="min-h-screen flex flex-col bg-gradient-to-br from-blue-50 via-white to-blue-100 overflow-hidden relative">
    <!-- Header -->
    <header class="py-6 px-4 flex justify-between items-center max-w-7xl mx-auto w-full">
      <div class="text-2xl md:text-3xl font-extrabold text-blue-700 tracking-wide flex items-center gap-2 animate-fade-down">
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/code/code-original.svg" class="w-8 h-8" alt="CLASS" />
        CLASS – Фуллстек курс 2026
      </div>
      <div>
        <Link v-if="canLogin" href="/login" class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition animate-fade-down animate-delay-200">Войти</Link>
      </div>
    </header>

    <!-- Hero Section -->
    <section class="flex flex-col md:flex-row items-center justify-center px-4 py-16 gap-10 max-w-7xl mx-auto w-full animate-fade-up">
      <div class="max-w-xl">
        <h1 class="text-4xl md:text-5xl font-extrabold text-blue-900 mb-6 leading-tight">
          CLASS — <span class="text-blue-600">Курс фуллстек-разработки</span> нового поколения
        </h1>
        <p class="text-blue-800 text-lg md:text-xl mb-8 font-medium">
          Откройте для себя мир IT и станьте востребованным специалистом.<br>
          Освойте все этапы создания современных веб-приложений: от идеи до запуска!
        </p>
        <div class="flex items-center gap-4 text-blue-700 mb-4">
          <span class="font-semibold">👨‍🏫 Преподаватель:</span>
          <span class="font-bold text-blue-900">Копанев Илья</span>
        </div>
        <div class="flex flex-wrap gap-3 text-blue-500 font-semibold mb-3">
          <span class="bg-blue-100 rounded px-3 py-1 text-sm">Фронтенд</span>
          <span class="bg-blue-100 rounded px-3 py-1 text-sm">Бэкенд</span>
          <span class="bg-blue-100 rounded px-3 py-1 text-sm">Чаты поддержки</span>
          <span class="bg-blue-100 rounded px-3 py-1 text-sm">Практика</span>
          <span class="bg-blue-100 rounded px-3 py-1 text-sm">Общение</span>
        </div>
      </div>
      <div class="flex justify-center animate-float">
        <img src="https://images.unsplash.com/photo-1519389950473-47c0e3769b2a?auto=format&fit=crop&w=400&q=80"
             alt="CLASS Fullstack"
             class="w-64 md:w-80 rounded-2xl shadow-xl border-4 border-blue-200" />
      </div>
    </section>

    <!-- About Course -->
    <section class="max-w-5xl mx-auto px-4 py-8 bg-white rounded-2xl shadow-lg mt-8 animate-fade-up animate-delay-300">
      <h2 class="text-2xl font-bold text-blue-800 mb-4">Почему CLASS?</h2>
      <ul class="list-disc pl-5 text-blue-700 text-lg space-y-2">
        <li>Курс создан для тех, кто хочет изменить свою жизнь и построить карьеру в IT</li>
        <li>Фуллстек: освоите и фронтенд, и бэкенд, и сможете работать над любыми проектами</li>
        <li>Практика с реальными заданиями и кейсами, а не просто теория</li>
        <li>Внутренние чаты для поддержки, общения и обмена опытом</li>
        <li>Личное сопровождение от преподавателя на каждом этапе обучения</li>
        <li>Портфолио, которое выделит вас среди других кандидатов</li>
        <li>Возможность работать удалённо или в офисе, в любой стране</li>
        <li>Вы получите уверенность, знания и навыки, которые ценятся работодателями</li>
      </ul>
    </section>

    <!-- Curriculum -->
    <section class="max-w-5xl mx-auto px-4 py-8 mt-10 animate-fade-up animate-delay-400">
      <h2 class="text-2xl font-bold text-blue-800 mb-4">Программа курса</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-blue-100 rounded-xl p-6 shadow flex flex-col gap-2">
          <h3 class="text-blue-700 font-semibold mb-2">Фронтенд</h3>
          <ul class="list-disc pl-5 text-blue-800">
            <li>Основы веба: верстка, стилизация, адаптивность</li>
            <li>JavaScript: логика, интерактивность, динамика</li>
            <li>Современные фреймворки: компоненты, SPA</li>
            <li>Работа с API, интеграция с сервером</li>
            <li>UI/UX: как делать удобно и красиво</li>
          </ul>
        </div>
        <div class="bg-blue-100 rounded-xl p-6 shadow flex flex-col gap-2">
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
    <section class="max-w-5xl mx-auto px-4 py-8 mt-10 bg-white rounded-2xl shadow-lg animate-fade-up animate-delay-500">
      <h2 class="text-2xl font-bold text-blue-800 mb-4">Что вы сможете после курса?</h2>
      <div class="space-y-4 text-blue-700 text-lg">
        <div>✔️ Создавать современные сайты и приложения с нуля</div>
        <div>✔️ Понимать, как работает интернет изнутри</div>
        <div>✔️ Работать на себя или устроиться в IT-компанию</div>
        <div>✔️ Получать достойную оплату за свои знания</div>
        <div>✔️ Самостоятельно решать сложные задачи и развиваться дальше</div>
        <div>✔️ Общаться с единомышленниками в чатах поддержки</div>
        <div>✔️ Быть уверенным в своих силах и знаниях</div>
        <div>✔️ Начать новую жизнь в сфере, которая развивается и будет востребована ещё много лет</div>
      </div>
    </section>

    <!-- About Teacher -->
    <section class="max-w-5xl mx-auto px-4 py-8 mt-10 bg-white rounded-2xl shadow-lg animate-fade-up animate-delay-600">
      <h2 class="text-2xl font-bold text-blue-800 mb-4">О преподавателе</h2>
      <div class="flex flex-col md:flex-row items-center gap-8">
        <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=200&q=80"
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
    <section class="max-w-5xl mx-auto px-4 py-8 mt-10 animate-fade-up animate-delay-700">
      <h2 class="text-2xl font-bold text-blue-800 mb-4">Вопросы и ответы</h2>
      <div class="space-y-4">
        <div class="bg-blue-50 rounded-xl p-4 shadow">
          <h3 class="font-semibold text-blue-700 mb-1">Нужны ли специальные знания?</h3>
          <p class="text-blue-800">Нет! Всё объясняется с нуля. Главное — желание учиться и развиваться.</p>
        </div>
        <div class="bg-blue-50 rounded-xl p-4 shadow">
          <h3 class="font-semibold text-blue-700 mb-1">Как проходит обучение?</h3>
          <p class="text-blue-800">Видеоуроки, практические задания, внутренние чаты для общения и поддержки.</p>
        </div>
        <div class="bg-blue-50 rounded-xl p-4 shadow">
          <h3 class="font-semibold text-blue-700 mb-1">Что если возникнут вопросы?</h3>
          <p class="text-blue-800">Всегда можно обратиться ко мне напрямую или в чат поддержки.</p>
        </div>
        <div class="bg-blue-50 rounded-xl p-4 shadow">
          <h3 class="font-semibold text-blue-700 mb-1">Какие проекты будем делать?</h3>
          <p class="text-blue-800">Портфолио, интернет-магазин, чат, REST API, и многое другое.</p>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="mt-auto py-6 px-4 bg-blue-600 text-white text-center animate-fade-up animate-delay-800">
      <div>
        CLASS © 2026 | Копанев Илья
      </div>
      <div class="mt-2">
        <span>Внутренние чаты поддержки и общения доступны после входа</span>
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
.animate-delay-800 { animation-delay: .8s;}
</style>