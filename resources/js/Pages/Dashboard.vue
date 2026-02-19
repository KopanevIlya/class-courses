<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Главная" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Главная
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- Блок про чаты -->
                        <div class="mb-8">
                            <h3 class="text-2xl font-bold text-blue-700 mb-2">Добро пожаловать!</h3>
                            <p>
                                Основная коммуникация теперь будет происходить в разделе <b>Чаты</b> — там вы сможете задать вопросы, получить поддержку и общаться с преподавателем и другими участниками.
                            </p>
                            <div class="mt-4">
                                <a
                                    href="/chats"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 transition"
                                >
                                    Перейти в чаты
                                </a>
                            </div>
                        </div>

                        <!-- Новый блок про видео -->
                        <div class="mb-8">
                            <h3 class="text-xl font-bold text-red-600 mb-2 flex items-center gap-2">
                                <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm5 3.5l5 2.5-5 2.5V7.5z"/>
                                </svg>
                                Раздел "Видео"
                            </h3>
                            <p>
                                Все записи уроков теперь доступны в разделе <b>Видео</b>. Здесь вы всегда сможете посмотреть пропущенные занятия или пересмотреть важные моменты.
                            </p>
                            <div class="mt-4">
                                <a
                                    href="/videos"
                                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-white hover:bg-red-700 transition"
                                >
                                    Перейти к записям видео
                                </a>
                            </div>
                        </div>

                        <!-- FAQ -->
                        <div>
                            <h3 class="text-xl font-semibold text-blue-800 mb-3">Часто задаваемые вопросы</h3>
                            <ul class="list-disc pl-5 space-y-2 text-gray-800">
                                <li>
                                    <b>Как попасть в чаты?</b><br>
                                    После входа на сайт вы можете перейти в раздел чатов по кнопке выше.
                                </li>
                                <li>
                                    <b>Для чего нужны чаты?</b><br>
                                    В чатах вы можете получать поддержку, задавать вопросы и общаться с другими участниками курса.
                                </li>
                                <li>
                                    <b>Что делать, если возникла техническая проблема?</b><br>
                                    Опишите вашу проблему в чате поддержки — вам обязательно помогут!
                                </li>
                                <li>
                                    <b>Можно ли общаться с преподавателем напрямую?</b><br>
                                    Да, в чате есть возможность задать вопрос преподавателю.
                                </li>
                                <li>
                                    <b>Где найти записи занятий?</b><br>
                                    Все записи уроков доступны в разделе <b>Видео</b>.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>