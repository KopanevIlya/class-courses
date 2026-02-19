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
                        <div class="mb-8">
                            <h3 class="text-2xl font-bold text-blue-700 mb-2">Добро пожаловать!</h3>
                            <p>
                                Основная коммуникация с вами теперь будет происходить в специальных <b>чатах</b> для слушателей курса.
                                Здесь вы сможете получить поддержку, задать вопросы, общаться с преподавателями и другими участниками.
                            </p>
                            <div class="mt-4">
                                <a
                                    href="https://t.me/your_chat_link"
                                    target="_blank"
                                    rel="noopener"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 transition"
                                >
                                    Перейти в чаты
                                </a>
                            </div>
                        </div>
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
                                <!-- Добавьте свои вопросы -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>