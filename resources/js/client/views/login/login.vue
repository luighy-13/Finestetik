<script src="./login.js"></script>

<template>
    <div
        class="flex flex-col justify-items-center items-center bg-gray-200 h-full"
    >
        <div class="w-3/12 bg-white  m-auto rounded">
            <div class="bg-primary rounded-t">
                <img src="/logo-white.png" class="m-auto" />
            </div>
            <div class="p-2">
                <label>Correo electrónico</label>
                <input v-model="email" type="text" />
                <label>Contraseña</label>
                <input v-model="password" type="text" />
                <button @click="login()" class="bg-primary rounded pt-2 pb-2 p-1 pl-2 pr-2 w-full mt-2 font-medium">
                    Entrar
                </button>
            </div>
        </div>
    </div>
</template>
