<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
  <Head title="Курсы по фронтенду | EasyUM" />

  <div class="min-h-screen flex flex-col bg-gradient-to-br from-blue-600 via-purple-600 to-pink-500 relative overflow-hidden">
    <!-- Background Circles -->
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
      <div class="absolute left-[-100px] top-[200px] w-[400px] h-[400px] bg-pink-400 opacity-30 rounded-full blur-[120px] animate-pulse"></div>
      <div class="absolute right-[-150px] top-[50px] w-[300px] h-[300px] bg-blue-400 opacity-25 rounded-full blur-[80px] animate-pulse"></div>
      <div class="absolute right-[50px] bottom-[100px] w-[200px] h-[200px] bg-purple-400 opacity-20 rounded-full blur-[60px] animate-pulse"></div>
    </div>

    <!-- Header -->
    <header class="z-10 py-6 px-4 flex justify-between items-center relative">
      <div class="text-white text-3xl font-extrabold tracking-wide animate-fade-down animate-delay-200">
        <span class="inline-block animate-bounce">🚀</span> EasyUM Frontend School
      </div>
      <div class="flex gap-3">
        <Link v-if="canLogin" href="/login" class="bg-white/80 text-blue-600 px-4 py-2 rounded shadow hover:bg-blue-100 transition animate-fade-down animate-delay-300">Войти</Link>
        <Link v-if="canRegister" href="/register" class="bg-white/80 text-pink-600 px-4 py-2 rounded shadow hover:bg-pink-100 transition animate-fade-down animate-delay-400">Регистрация</Link>
      </div>
    </header>

    <!-- Hero Section -->
    <section class="z-10 flex flex-col md:flex-row items-center justify-center px-4 py-16 gap-10 relative">
      <div class="max-w-xl animate-fade-right animate-delay-500">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6 leading-tight drop-shadow-lg">
          <span class="bg-gradient-to-r from-pink-400 via-purple-400 to-blue-400 text-transparent bg-clip-text">
            Онлайн курсы по фронтенду
          </span>
        </h1>
        <p class="text-white text-lg md:text-xl mb-8 font-medium animate-fade-up animate-delay-700">
          Учись у топовых наставников, создавай реальные проекты и получай востребованные навыки!
        </p>
        <Link v-if="canRegister" href="/register"
          class="inline-block bg-gradient-to-r from-pink-500 to-purple-500 text-white px-7 py-4 rounded-xl font-bold shadow-lg hover:scale-105 hover:bg-gradient-to-r hover:from-purple-500 hover:to-pink-500 transition-all duration-300 animate-fade-up animate-delay-900">
          Начать обучение
        </Link>
      </div>
      <div class="flex justify-center animate-fade-left animate-delay-700">
        <img src="https://it.easyum.ru/assets/img/hero-img.png"
             alt="Frontend Courses"
             class="w-80 md:w-96 rounded-2xl shadow-2xl border-4 border-white/40 animate-float" />
      </div>
    </section>

    <!-- Courses Cards -->
    <section class="z-10 px-4 py-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-6xl mx-auto animate-fade-up animate-delay-1000">
      <div class="bg-white/90 rounded-2xl shadow-xl p-8 flex flex-col items-center hover:scale-105 transition group animate-fade-up animate-delay-1100">
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg"
             class="w-16 h-16 mb-4 animate-spin-slow group-hover:animate-none" alt="HTML" />
        <h2 class="text-xl font-bold mb-2 text-blue-600">HTML & CSS</h2>
        <p class="text-gray-700 text-center">Верстка, адаптив, Flexbox, Grid, UI/UX.</p>
      </div>
      <div class="bg-white/90 rounded-2xl shadow-xl p-8 flex flex-col items-center hover:scale-105 transition group animate-fade-up animate-delay-1200">
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg"
             class="w-16 h-16 mb-4 animate-wiggle group-hover:animate-none" alt="JS" />
        <h2 class="text-xl font-bold mb-2 text-yellow-500">JavaScript</h2>
        <p class="text-gray-700 text-center">JS, DOM, ES6+, API, интерактив.</p>
      </div>
      <div class="bg-white/90 rounded-2xl shadow-xl p-8 flex flex-col items-center hover:scale-105 transition group animate-fade-up animate-delay-1300">
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg"
             class="w-16 h-16 mb-4 animate-fade-up group-hover:animate-none" alt="Vue" />
        <h2 class="text-xl font-bold mb-2 text-green-500">Vue / React</h2>
        <p class="text-gray-700 text-center">Компоненты, SPA, роутинг, state, best practices.</p>
      </div>
    </section>

    <!-- Features -->
    <section class="z-10 px-4 py-10 bg-white/80 rounded-2xl mx-4 mb-8 max-w-5xl mx-auto animate-fade-up animate-delay-1400">
      <h3 class="text-2xl md:text-3xl font-extrabold text-center mb-8 text-purple-700">
        Почему выбирают EasyUM?
      </h3>
      <div class="flex flex-col md:flex-row gap-8 justify-center items-stretch">
        <div class="flex-1 text-center animate-fade-up animate-delay-1500">
          <span class="text-blue-500 text-5xl font-bold animate-bounce">🔥</span>
          <p class="font-semibold mt-3 text-lg">Практика с реальными проектами</p>
        </div>
        <div class="flex-1 text-center animate-fade-up animate-delay-1600">
          <span class="text-purple-500 text-5xl font-bold animate-bounce">👨‍💻</span>
          <p class="font-semibold mt-3 text-lg">Опытные наставники</p>
        </div>
        <div class="flex-1 text-center animate-fade-up animate-delay-1700">
          <span class="text-pink-500 text-5xl font-bold animate-bounce">💼</span>
          <p class="font-semibold mt-3 text-lg">Помощь с трудоустройством</p>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="z-10 mt-auto py-6 px-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-center animate-fade-up animate-delay-1800">
      <div>
        Laravel {{ laravelVersion }} | PHP {{ phpVersion }} &nbsp; | &nbsp; EasyUM © 2024
      </div>
      <div class="mt-2">
        <a href="https://it.easyum.ru/" target="_blank" class="underline hover:text-pink-300">Наш сайт</a>
        &nbsp;|&nbsp;
        <a href="mailto:info@easyum.ru" class="underline hover:text-blue-300">Контакты</a>
      </div>
    </footer>
  </div>
</template>

<style scoped>
/* Анимации с Tailwind (добавьте в tailwind.config.js) */
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
@keyframes fade-left {
  0% { opacity: 0; transform: translateX(40px);}
  100% { opacity: 1; transform: translateX(0);}
}
@keyframes float {
  0%, 100% { transform: translateY(0);}
  50% { transform: translateY(-20px);}
}
@keyframes wiggle {
  0%, 100% { transform: rotate(-5deg);}
  50% { transform: rotate(5deg);}
}
@keyframes spin-slow {
  0% { transform: rotate(0);}
  100% { transform: rotate(360deg);}
}
.animate-fade-up { animation: fade-up 1s cubic-bezier(.68,-0.55,.27,1.55) both;}
.animate-fade-down { animation: fade-down 1s cubic-bezier(.68,-0.55,.27,1.55) both;}
.animate-fade-right { animation: fade-right 1s cubic-bezier(.68,-0.55,.27,1.55) both;}
.animate-fade-left { animation: fade-left 1s cubic-bezier(.68,-0.55,.27,1.55) both;}
.animate-float { animation: float 3s ease-in-out infinite;}
.animate-wiggle { animation: wiggle 1s ease-in-out infinite;}
.animate-spin-slow { animation: spin-slow 6s linear infinite;}
.animate-bounce { animation: bounce 1s infinite;}
/* Для задержки анимаций */
.animate-delay-200 { animation-delay: .2s;}
.animate-delay-300 { animation-delay: .3s;}
.animate-delay-400 { animation-delay: .4s;}
.animate-delay-500 { animation-delay: .5s;}
.animate-delay-700 { animation-delay: .7s;}
.animate-delay-900 { animation-delay: .9s;}
.animate-delay-1000 { animation-delay: 1s;}
.animate-delay-1100 { animation-delay: 1.1s;}
.animate-delay-1200 { animation-delay: 1.2s;}
.animate-delay-1300 { animation-delay: 1.3s;}
.animate-delay-1400 { animation-delay: 1.4s;}
.animate-delay-1500 { animation-delay: 1.5s;}
.animate-delay-1600 { animation-delay: 1.6s;}
.animate-delay-1700 { animation-delay: 1.7s;}
.animate-delay-1800 { animation-delay: 1.8s;}
</style>