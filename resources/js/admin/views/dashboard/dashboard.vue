<script src="./dashboard.js"></script>
<template>
    <div class=" relative h-screen">
        <div class="bg-primary h-14 flex">
            <div class="w-1/6">
                 <img src="/logo-white.png" class="w-3/4 h-full m-auto" />
            </div>
            <div class="w-5/6 pt-4 pr-2 pl-2 flex">
                <div class="w-3/12">
                    <button><i class=" fas fa-bars"></i></button>
                </div>
                <div class="w-1/2"></div>
                <div class="w-3/12 text-right">
                    <button><i class=" fas fa-sign-out-alt"></i> Salir</button>
                </div>
            </div>
        </div>

        <div class="flex h-full ">
            <div class="bg-white overflow-auto h-full w-1/6 pt-2 shadow border-r">
                <div class="text-center">
                    <div
                        class="rounded-full bg-primary w-14 h-14 m-auto text-center"
                    >
                        A
                    </div>
                    <p class="text-base text-sky-600 font-bold">
                        Luciano Flores
                    </p>
                    <p class="text-sm text-sky-600">Administrador</p>
                </div>

                <div class="p-2 h-full ">
                    <p class="text-sm text-gray-400">Menu</p>

                    <template v-for="(item, key) in menu_items">
                        <template>
                            <div
                                :key="key"
                                class="hover:bg-gray-200 rounded p-1 pt-2 pb-2 mt-1 cursor-pointer flex text-gray-600"
                            >
                                <p class="mr-1"><i :class="item.icon"></i></p>
                                <p class="w-5/6">{{ item.name }}</p>
                                <p v-if="item.group">
                                    <i class="fas fa-angle-right"></i>
                                </p>
                            </div>

                            <div v-if="item.group" class="pl-4" :key="key">
                                <div
                                    v-for="(item_group, key_g) in item.group"
                                    :key="key_g"
                                    class="hover:bg-gray-200 rounded p-1 pt-2 pb-2 mt-1 cursor-pointer flex text-gray-600"
                                >
                                    <p>{{ item_group.name }}</p>
                                </div>
                            </div>
                        </template>
                    </template>
                </div>
            </div>
            <div class="w-5/6">
                <!-- <div class="bg-primary h-44 w-full">
                    <p class=""></p>
                </div> -->
            </div>
        </div>
    </div>
</template>
