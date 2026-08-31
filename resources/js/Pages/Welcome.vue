<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted, onUnmounted } from 'vue';

defineProps({
    canLogin: Boolean,
});

const deadline = new Date('2026-09-29T00:00:00');
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
        timer.value.days = 0;
        timer.value.hours = 0;
        timer.value.minutes = 0;
        timer.value.seconds = 0;
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

    <div class="min-h-screen relative overflow-hidden bg-[#060816] text-white">
        <!-- Background -->
        <div class="absolute inset-0 -z-10">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(59,130,246,0.30),_transparent_30%),radial-gradient(circle_at_top_right,_rgba(168,85,247,0.25),_transparent_30%),radial-gradient(circle_at_bottom,_rgba(14,165,233,0.22),_transparent_35%)]"></div>
            <div class="absolute top-[-120px] left-[-120px] w-[420px] h-[420px] bg-blue-500/20 rounded-full blur-[120px] animate-orb-1"></div>
            <div class="absolute right-[-120px] top-[100px] w-[360px] h-[360px] bg-fuchsia-500/20 rounded-full blur-[120px] animate-orb-2"></div>
            <div class="absolute left-[35%] bottom-[-100px] w-[340px] h-[340px] bg-cyan-400/20 rounded-full blur-[120px] animate-orb-3"></div>
            <div class="absolute inset-0 bg-[linear-gradient(to_bottom,rgba(255,255,255,0.03)_1px,transparent_1px),linear-gradient(to_right,rgba(255,255,255,0.03)_1px,transparent_1px)] bg-[size:40px_40px] opacity-20"></div>
        </div>

        <!-- Header -->
        <header class="relative z-10 max-w-7xl mx-auto px-4 py-6">
            <div class="flex items-center justify-between rounded-2xl border border-white/10 bg-white/5 backdrop-blur-xl px-5 py-4 shadow-[0_10px_40px_rgba(0,0,0,0.25)]">
                <div class="flex items-center gap-3 animate-fade-down">
                    <img src="../../../public/img/logo.png" style="height: 64px;" alt="CLASS" />
                    <div>
                        <div class="text-xl md:text-2xl font-black tracking-wide text-white">CLASS</div>
                        <div class="text-xs md:text-sm text-blue-200/80">Новый уровень обучения разработке</div>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <a
                        href="https://max.ru/u/f9LHodD0cOJyH5Ib7C3jIeAsA2zpnWueT4xGaSy3KXm6XkOnHv3XLUH3Bf0"
                        target="_blank"
                        rel="noopener"
                        title="Мессенджер Max"
                        class="group rounded-xl border border-white/10 bg-white/5 p-2 backdrop-blur-md transition duration-300 hover:scale-110 hover:bg-white/10"
                    >
                        <img src="../../../public/img/max.png" alt="Max Messenger" class="w-7 h-7 rounded-full shadow-lg" />
                    </a>

                    <Link
                        v-if="canLogin"
                        href="/login"
                        class="rounded-xl bg-gradient-to-r from-blue-500 via-cyan-400 to-fuchsia-500 px-5 py-2.5 text-sm md:text-base font-bold text-white shadow-[0_10px_30px_rgba(59,130,246,0.45)] transition duration-300 hover:scale-105 hover:shadow-[0_15px_40px_rgba(168,85,247,0.45)]"
                    >
                        Войти
                    </Link>
                </div>
            </div>
        </header>

        <!-- Hero -->
        <section class="relative z-10 max-w-7xl mx-auto px-4 pt-8 pb-20">
            <div class="grid items-center gap-12 md:grid-cols-2">
                <div class="animate-fade-up">
                    <div class="inline-flex items-center gap-2 rounded-full border border-cyan-400/20 bg-cyan-400/10 px-4 py-2 text-sm text-cyan-200 shadow-lg mb-6">
                        <span class="h-2 w-2 rounded-full bg-cyan-300 animate-pulse"></span>
                        Стартуй в IT с реальной практикой
                    </div>

                    <h1 class="text-4xl md:text-6xl font-black leading-tight mb-6">
                        <span class="text-white">CLASS —</span>
                        <span class="block bg-gradient-to-r from-blue-400 via-cyan-300 to-fuchsia-400 bg-clip-text text-transparent">
                            яркий курс фуллстек-разработки нового поколения
                        </span>
                    </h1>

                    <p class="text-base md:text-xl text-slate-300 mb-8 leading-relaxed max-w-2xl">
                        Не просто обучение, а реальный старт в IT.
                        Получай <span class="text-white font-semibold">знания</span>,
                        <span class="text-white font-semibold">практику</span>,
                        <span class="text-white font-semibold">поддержку</span> и
                        выходи на новый уровень вместе с CLASS.
                    </p>

                    <div class="flex flex-wrap gap-3 mb-6">
                        <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-blue-100 backdrop-blur-md">Фронтенд</span>
                        <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-blue-100 backdrop-blur-md">Бэкенд</span>
                        <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-blue-100 backdrop-blur-md">Практика</span>
                        <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-blue-100 backdrop-blur-md">Поддержка</span>
                        <span class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-blue-100 backdrop-blur-md">Сообщество</span>
                    </div>

                    <div class="flex items-center gap-3 text-slate-300 mb-8">
                        <div class="h-11 w-11 rounded-full bg-gradient-to-br from-blue-500 to-fuchsia-500 flex items-center justify-center font-bold shadow-lg">
                            IK
                        </div>
                        <div>
                            <div class="text-sm text-slate-400">Преподаватель</div>
                            <div class="text-lg font-bold text-white">Копанев Илья</div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <Link
                            v-if="canLogin"
                            href="/login"
                            class="inline-flex items-center justify-center rounded-2xl bg-gradient-to-r from-blue-500 via-cyan-400 to-fuchsia-500 px-7 py-4 font-bold text-white shadow-[0_10px_35px_rgba(59,130,246,0.35)] transition hover:scale-[1.03]"
                        >
                            Начать обучение
                        </Link>

                        <a
                            href="#price"
                            class="inline-flex items-center justify-center rounded-2xl border border-white/10 bg-white/5 px-7 py-4 font-semibold text-white backdrop-blur-xl transition hover:bg-white/10"
                        >
                            Узнать стоимость
                        </a>
                    </div>
                </div>

                <div class="relative flex justify-center animate-float">
                    <div class="absolute inset-0 bg-gradient-to-tr from-blue-500/20 to-fuchsia-500/20 blur-3xl rounded-full"></div>
                    <div class="relative rounded-[32px] border border-white/10 bg-white/5 p-4 backdrop-blur-2xl shadow-[0_20px_80px_rgba(0,0,0,0.35)]">
                        <img
                            src="../../../public/img/Class.png"
                            alt="CLASS Fullstack"
                            class="w-72 md:w-[420px] rounded-[24px] object-cover"
                        />
                    </div>
                </div>
            </div>
        </section>

        <!-- Why CLASS -->
        <section class="relative z-10 max-w-6xl mx-auto px-4 mb-10">
            <div class="rounded-[32px] border border-white/10 bg-white/5 backdrop-blur-2xl p-8 md:p-10 shadow-[0_15px_50px_rgba(0,0,0,0.25)] animate-fade-up">
                <h2 class="text-3xl md:text-4xl font-black mb-8 bg-gradient-to-r from-cyan-300 to-fuchsia-400 bg-clip-text text-transparent">
                    Почему CLASS?
                </h2>

                <div class="grid md:grid-cols-2 gap-5">
                    <div class="card-modern">🚀 Больше, чем курс — это сообщество, поддержка и развитие</div>
                    <div class="card-modern">💻 Освоишь и фронтенд, и бэкенд на практике</div>
                    <div class="card-modern">🧠 Реальные задания вместо сухой теории</div>
                    <div class="card-modern">💬 Внутренние чаты для общения и помощи</div>
                    <div class="card-modern">🎯 Личное сопровождение преподавателя</div>
                    <div class="card-modern">📁 Сильное портфолио для старта карьеры</div>
                    <div class="card-modern">🌍 Возможность работать удалённо из любой точки мира</div>
                    <div class="card-modern">🔥 Ты становишься частью современной IT-среды</div>
                </div>

                <div class="mt-8 text-lg md:text-xl text-cyan-200 font-semibold">
                    После входа тебе будут доступны внутренние чаты поддержки и общения.
                </div>
            </div>
        </section>

        <!-- How -->
        <section class="relative z-10 max-w-6xl mx-auto px-4 mb-10">
            <div class="rounded-[32px] border border-blue-400/20 bg-gradient-to-br from-blue-500/10 to-cyan-400/10 backdrop-blur-2xl p-8 md:p-10 shadow-[0_15px_50px_rgba(0,0,0,0.25)]">
                <h2 class="text-3xl md:text-4xl font-black mb-8 text-white">
                    Как проходит обучение
                </h2>

                <div class="grid md:grid-cols-2 gap-5">
                    <div class="card-modern">🎥 Онлайн-занятия в формате видеоконференций</div>
                    <div class="card-modern">📼 После урока запись сразу публикуется на платформе</div>
                    <div class="card-modern">📚 Все материалы, домашки и чаты в одном месте</div>
                    <div class="card-modern">⏱ Можно учиться в удобном темпе и пересматривать уроки</div>
                    <div class="card-modern">🛠 Разбор задач в прямом эфире и в чате</div>
                    <div class="card-modern">✅ Пропустил занятие? Все записи сохраняются</div>
                </div>
            </div>
        </section>

        <!-- Price -->
        <section id="price" class="relative z-10 max-w-6xl mx-auto px-4 mb-10">
            <div class="rounded-[32px] border border-fuchsia-400/20 bg-white/5 backdrop-blur-2xl p-8 md:p-10 shadow-[0_15px_50px_rgba(0,0,0,0.25)]">
                <div class="grid md:grid-cols-2 gap-10 items-center">
                    <div>
                        <div class="inline-block rounded-full bg-fuchsia-500/15 border border-fuchsia-400/20 px-4 py-2 text-sm text-fuchsia-200 mb-5">
                            Ограниченное предложение
                        </div>

                        <h2 class="text-3xl md:text-4xl font-black mb-4">Цена курса</h2>
                        <p class="text-slate-300 text-lg mb-4">
                            Курс включает <span class="font-bold text-white">30 занятий</span>,
                            практику, поддержку и доступ к материалам.
                        </p>

                        <div class="mb-3">
                            <span class="text-4xl font-black text-white">35 000 ₽</span>
                            <span class="ml-3 text-xl text-slate-400 line-through">45 000 ₽</span>
                        </div>

                        <div class="text-cyan-200 font-medium">
                            Доступна рассрочка или единоразовая оплата
                        </div>
                    </div>

                    <div class="rounded-[28px] border border-white/10 bg-gradient-to-br from-blue-500/10 via-cyan-400/10 to-fuchsia-500/10 p-6 text-center">
                        <div class="text-lg font-semibold text-slate-200 mb-4">До конца акции осталось:</div>

                        <div class="grid grid-cols-4 gap-3">
                            <div class="timer-box">
                                <div class="timer-value">{{ timer.days }}</div>
                                <div class="timer-label">дней</div>
                            </div>
                            <div class="timer-box">
                                <div class="timer-value">{{ timer.hours }}</div>
                                <div class="timer-label">часов</div>
                            </div>
                            <div class="timer-box">
                                <div class="timer-value">{{ timer.minutes }}</div>
                                <div class="timer-label">минут</div>
                            </div>
                            <div class="timer-box">
                                <div class="timer-value">{{ timer.seconds }}</div>
                                <div class="timer-label">секунд</div>
                            </div>
                        </div>

                        <div class="mt-4 text-sm text-slate-400">
                            Акция действует до 29 сентября 2026 года
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Program -->
        <section class="relative z-10 max-w-6xl mx-auto px-4 mb-10">
            <h2 class="text-3xl md:text-4xl font-black mb-8 text-center">
                Программа курса
            </h2>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="rounded-[28px] border border-cyan-400/20 bg-cyan-400/10 backdrop-blur-xl p-8 shadow-lg hover:-translate-y-1 transition">
                    <h3 class="text-2xl font-bold mb-4 text-cyan-200">Фронтенд</h3>
                    <ul class="space-y-3 text-slate-200">
                        <li>• Основы веба: верстка, стилизация, адаптивность</li>
                        <li>• JavaScript: логика, интерактивность, динамика</li>
                        <li>• Современные фреймворки и SPA</li>
                        <li>• Работа с API и интеграция с сервером</li>
                        <li>• UI/UX: как делать красиво и удобно</li>
                    </ul>
                </div>

                <div class="rounded-[28px] border border-fuchsia-400/20 bg-fuchsia-400/10 backdrop-blur-xl p-8 shadow-lg hover:-translate-y-1 transition">
                    <h3 class="text-2xl font-bold mb-4 text-fuchsia-200">Бэкенд</h3>
                    <ul class="space-y-3 text-slate-200">
                        <li>• Основы серверной разработки</li>
                        <li>• Работа с базами данных</li>
                        <li>• Создание REST API</li>
                        <li>• Авторизация и безопасность</li>
                        <li>• Деплой и поддержка проектов</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Result -->
        <section class="relative z-10 max-w-6xl mx-auto px-4 mb-10">
            <div class="rounded-[32px] border border-white/10 bg-white/5 backdrop-blur-2xl p-8 md:p-10">
                <h2 class="text-3xl md:text-4xl font-black mb-8">Что ты сможешь после курса?</h2>

                <div class="grid md:grid-cols-2 gap-4 text-slate-200 text-lg">
                    <div class="card-modern">✔ Создавать сайты и приложения с реальной пользой</div>
                    <div class="card-modern">✔ Понимать современные технологии и как устроен интернет</div>
                    <div class="card-modern">✔ Работать на себя или в IT-компании</div>
                    <div class="card-modern">✔ Решать задачи самостоятельно и расти дальше</div>
                    <div class="card-modern">✔ Получать поддержку и окружение единомышленников</div>
                    <div class="card-modern">✔ Начать новую карьеру в востребованной сфере</div>
                </div>

                <div class="mt-8 text-xl md:text-2xl font-bold bg-gradient-to-r from-blue-300 to-fuchsia-300 bg-clip-text text-transparent">
                    CLASS — твой реальный шанс войти в IT.
                </div>
            </div>
        </section>

        <!-- Reviews -->
        <section class="relative z-10 max-w-6xl mx-auto px-4 mb-10">
            <h2 class="text-3xl md:text-4xl font-black mb-8 text-center">Отзывы студентов</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="review-card">
                    <img src="../../../public/img/_6645e13e1e998.jpg" class="review-avatar" alt="review1" />
                    <div class="review-name">Алексей, 27 лет</div>
                    <div class="review-text">“CLASS изменил мою жизнь. Теперь я работаю в IT и могу реализовать свои идеи!”</div>
                </div>

                <div class="review-card">
                    <img src="../../../public/img/_6480216064b84.jpg" class="review-avatar" alt="review2" />
                    <div class="review-name">Марина, 34 года</div>
                    <div class="review-text">“Очень крутая атмосфера и поддержка! Даже сложные темы стали понятными.”</div>
                </div>

                <div class="review-card">
                    <img src="../../../public/img/333555.webp" class="review-avatar" alt="review3" />
                    <div class="review-name">Дмитрий, 26 лет</div>
                    <div class="review-text">“После CLASS я смог сделать свой первый проект и устроиться на работу!”</div>
                </div>
            </div>
        </section>

        <!-- Teacher -->
        <section class="relative z-10 max-w-6xl mx-auto px-4 mb-10">
            <div class="rounded-[32px] border border-white/10 bg-white/5 backdrop-blur-2xl p-8 md:p-10">
                <h2 class="text-3xl md:text-4xl font-black mb-8">О преподавателе</h2>

                <div class="flex flex-col md:flex-row items-center gap-8">
                    <img
                        src="../../../public/img/DSC-206.JPG"
                        alt="Копанев Илья"
                        class="w-36 h-36 rounded-full object-cover border-4 border-cyan-400/30 shadow-[0_0_40px_rgba(34,211,238,0.25)]"
                    />

                    <div>
                        <p class="text-xl font-bold text-white mb-3">Копанев Илья — ваш личный наставник</p>
                        <p class="text-slate-300 leading-relaxed text-base md:text-lg">
                            Более 10 лет в веб-разработке, сотни реализованных проектов и десятки обученных студентов.
                            Я лично отвечаю на вопросы, помогаю разбираться даже в сложных темах и веду тебя к новой профессии.
                            CLASS — это путь к уверенности, навыкам и реальным результатам.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section class="relative z-10 max-w-6xl mx-auto px-4 pb-16">
            <h2 class="text-3xl md:text-4xl font-black mb-8">Вопросы и ответы</h2>

            <div class="space-y-4">
                <div class="faq-card">
                    <h3 class="faq-title">Нужны ли специальные знания?</h3>
                    <p class="faq-text">Нет. Всё объясняется с нуля. Главное — желание учиться и расти.</p>
                </div>

                <div class="faq-card">
                    <h3 class="faq-title">Как проходит обучение?</h3>
                    <p class="faq-text">
                        Все занятия онлайн. После каждого урока запись публикуется на платформе.
                        Практика, материалы и чаты доступны участникам курса.
                    </p>
                </div>

                <div class="faq-card">
                    <h3 class="faq-title">Что если возникнут вопросы?</h3>
                    <p class="faq-text">Всегда можно обратиться напрямую ко мне или в чат поддержки.</p>
                </div>

                <div class="faq-card">
                    <h3 class="faq-title">Какие проекты будем делать?</h3>
                    <p class="faq-text">Портфолио, интернет-магазин, чат, REST API и другие реальные проекты.</p>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="relative z-10 border-t border-white/10 bg-white/5 backdrop-blur-2xl">
            <div class="max-w-6xl mx-auto px-4 py-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <div class="text-lg font-bold">CLASS © 2026</div>
                    <div class="text-sm text-slate-400">Внутренние чаты поддержки доступны после входа</div>
                </div>

                <div class="flex flex-wrap items-center gap-4 text-sm text-slate-300">
                    <a href="/offer" target="_blank" rel="noopener" class="hover:text-white transition">Публичный договор (оферта)</a>
                    <span class="text-slate-500">|</span>
                    <a href="/policy" target="_blank" rel="noopener" class="hover:text-white transition">Политика конфиденциальности</a>
                </div>
            </div>
        </footer>
    </div>
</template>

<style scoped>
@keyframes orb1 {
    0%, 100% { transform: translate(0, 0) scale(1); }
    50% { transform: translate(50px, 40px) scale(1.08); }
}
@keyframes orb2 {
    0%, 100% { transform: translate(0, 0) scale(1); }
    50% { transform: translate(-40px, 30px) scale(1.1); }
}
@keyframes orb3 {
    0%, 100% { transform: translate(0, 0) scale(1); }
    50% { transform: translate(30px, -30px) scale(1.06); }
}
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(28px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
@keyframes fadeDown {
    from {
        opacity: 0;
        transform: translateY(-28px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-18px); }
}

.animate-orb-1 { animation: orb1 10s ease-in-out infinite; }
.animate-orb-2 { animation: orb2 12s ease-in-out infinite; }
.animate-orb-3 { animation: orb3 14s ease-in-out infinite; }
.animate-fade-up { animation: fadeUp 1s ease both; }
.animate-fade-down { animation: fadeDown 1s ease both; }
.animate-float { animation: float 4s ease-in-out infinite; }

.card-modern {
    border: 1px solid rgba(255,255,255,0.08);
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(14px);
    border-radius: 20px;
    padding: 18px 20px;
    color: #e2e8f0;
    transition: all .3s ease;
}
.card-modern:hover {
    transform: translateY(-4px);
    background: rgba(255,255,255,0.08);
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.timer-box {
    border: 1px solid rgba(255,255,255,0.08);
    background: rgba(255,255,255,0.06);
    border-radius: 20px;
    padding: 16px 10px;
    backdrop-filter: blur(12px);
}
.timer-value {
    font-size: 2rem;
    font-weight: 900;
    line-height: 1;
    color: white;
}
.timer-label {
    margin-top: 8px;
    font-size: 0.8rem;
    color: #cbd5e1;
    text-transform: uppercase;
    letter-spacing: 0.04em;
}

.review-card {
    border: 1px solid rgba(255,255,255,0.08);
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(16px);
    border-radius: 28px;
    padding: 28px 20px;
    text-align: center;
    transition: all .3s ease;
}
.review-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.22);
}
.review-avatar {
    width: 72px;
    height: 72px;
    object-fit: cover;
    border-radius: 999px;
    margin: 0 auto 16px;
    border: 3px solid rgba(255,255,255,0.15);
}
.review-name {
    font-weight: 800;
    font-size: 1.05rem;
    color: white;
    margin-bottom: 10px;
}
.review-text {
    color: #cbd5e1;
    line-height: 1.6;
}

.faq-card {
    border: 1px solid rgba(255,255,255,0.08);
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(16px);
    border-radius: 24px;
    padding: 22px;
    transition: all .3s ease;
}
.faq-card:hover {
    background: rgba(255,255,255,0.07);
}
.faq-title {
    color: white;
    font-weight: 800;
    margin-bottom: 8px;
}
.faq-text {
    color: #cbd5e1;
    line-height: 1.6;
}
</style>