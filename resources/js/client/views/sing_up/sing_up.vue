<template>
    <div class="overflow-scroll">
        <div class="flex flex-row flex-wrap items-baseline">
            <div class="w-1/2">
                <div class="shadow border m-2 p-2">
                    <label>Nombre</label>
                    <input />
                    <div class="flex flex-row flex-wrap">
                        <div class="w-1/2">
                            <label>Apellido paterno</label>
                            <input />
                        </div>
                        <div class="w-1/2">
                            <label>Apellido materno</label>
                            <input />
                        </div>
                        <div class="w-1/2">
                            <label>Teléfono</label>
                            <input />
                        </div>
                        <div class="w-1/2">
                            <label>Edad</label>
                            <input />
                        </div>
                        <div class="w-1/2">
                            <label>Sexo</label>
                            <input />
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-1/2">
                <div class="shadow border m-2 p-2">
                    <label>Correo electrónico</label>
                    <input />
                    <label>Contraseña</label>
                    <input />
                    <label>Confirmar Contraseña</label>
                    <input />
                </div>
            </div>
            <div class="w-1/2">
                <div class="shadow border m-2 p-2">
                    <label>Calle</label>
                    <input />
                    <div class="flex flex-row flex-wrap">
                        <div class="w-1/2">
                            <label>CP</label>
                            <input />
                        </div>

                        <div class="w-1/2">
                            <label>Num. Int</label>
                            <input />
                        </div>

                        <div class="w-1/2">
                            <label>Num. Ext</label>
                            <input />
                        </div>
                    </div>
                    <label>Colonia</label>
                    <input />
                </div>
            </div>
            <div class="w-1/2">
                <div class="shadow border m-2 p-2">
                    <label>Foto de identificacón</label>
                    <input />
                    <label>Comprobate de domicilio</label>
                    <input />
                    <label>RFC</label>
                    <input />
                    <label>Dirección Fiscal</label>
                    <input />
                    <label>Constancia Fiscal</label>
                    <input />
                </div>
            </div>
        </div>
        <div class="text-right">
            <button
                class="rounded m-auto bg-primary p-2 uppercase font-bold text-center"
            >
                Crear cuenta
            </button>
        </div>
    </div>
</template>
