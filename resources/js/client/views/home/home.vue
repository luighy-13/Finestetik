<template>
    <div class="relative bg-gray-100 ">
        <div class="bg-primary w-full h-3/6 border-bottom">
            <div class="flex h-20">
                <div class="w-1/2 relative">
                    <img src="/logo-white.png" class="" />
                </div>
                <div
                    class="xs:w-0 md:w-1/2  flex flex-row items-center justify-end"
                >
                    <a class="font-bold mr-2">Inicio</a>
                    <a class="font-bold mr-2">Contactanos</a>
                    <a class="font-bold mr-2">Registrarme</a>
                    <a class="font-bold mr-2">Iniciar Sesión</a>
                    <!-- <div class="mr-2">
                        <a class="font-bold mr-2">Mi perfil</a>
                        <div
                            class="bg-white m-1 absolute shadow w-48 flex flex-col rounded z-10 right-0"
                        >
                            <a
                                class="font-bold mr-2 text-gray-600 w-full pl-2 pr-2 h-primary rounded-t"
                                >Mi Cirugía</a
                            >
                            <a
                                class="font-bold mr-2 text-gray-600 w-full pl-2 pr-2 h-primary"
                                >Mis Tarjetas</a
                            >
                            <a
                                class="font-bold mr-2 text-gray-600 w-full pl-2 pr-2 h-primary"
                                >Recibos y Facturas</a
                            >
                            <a
                                class="font-bold mr-2 text-gray-600 w-full pl-2 pr-2 h-primary rounded-b"
                                >Cerrar Sesión</a
                            >
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <div
            class="bk-presentation flex-center flex-column w-full items-center justify-end"
        >
            <p class="text-center text-4xl font-bold">
                Planes de financiamiento para tu cirugía estética
            </p>
            <p class="text-center text-2xl">
                No pagues tu cirugía de contado, déjanos ayudarte con un plan de
                financiamiento mensual hecho a tu medida.
            </p>
        </div>

        <div class="mt-8">
            <p class="text-center text-2xl font-bold">¿Quiénes somos?</p>
            <p class="w-1/2 text-center m-auto italic font-medium">
                "Somos un grupo de emprendedores en el sector de financiamiento
                especializado. Nos enfocamos en ofrecer planes de financiamiento
                sencillos de entender, fácil y rápido de obtener y que mejor se
                acomoden a tus necesidades."
            </p>
            <p class="border-b mr-20 ml-20 mt-2"></p>
        </div>

        <div class="mt-8">
            <p class="text-2xl font-bold">Cotizador</p>
            <div class="flex flex-row flex-wrap">
                <div class="xs:w-full md:w-1/2 pl-2">
                    <label for="">Nombre</label>
                    <input type="text" />
                    <label for="">Teléfono</label>
                    <input type="text" />
                    <label for="">Correo</label>
                    <input type="text" />
                    <label for="">Costo Operacón</label>
                    <input type="text" />
                    <label for="">Plazo (meses)</label>
                    <input type="text" />
                    <div class="flex">
                        <div class="w-1/2 text-center">
                            <label for="">Enganche</label>
                            <p class="">20%</p>
                        </div>
                        <div class="w-1/2 text-center">
                            <label for="">Interés mensual</label>
                            <p class="">3%</p>
                        </div>
                    </div>
                </div>
                <div class="xs:w-full md:w-1/2 ">
                    <div class="p-2">
                        <table class="w-full shadow rounded">
                            <thead
                                class="text-center text-white font-bold  bg-primary rounded-t"
                            >
                                <td>Enganche</td>
                                <td>Mensualidad</td>
                                <td>Mes de la Operacón</td>
                                <td>Total a Pagar</td>
                            </thead>
                            <tbody class="text-center bg-white">
                                <tr>
                                    <td>$0</td>
                                    <td>$0</td>
                                    <td>0</td>
                                    <td>$0</td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        <div class="">
                                            Ingrese los datos solicitados para
                                            calcular la información.
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button
                        class="rounded m-auto  bg-primary p-2 uppercase font-bold text-center"
                    >
                        Crear mi cuenta
                    </button>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <div class="w-full text-center">
                <p class="text-2xl font-bold">Contactanos</p>
                <p>Un asesor se pondrá en contacto con usted</p>
            </div>
            <div class="flex">
                <div class="xs:w-full md:w-1/2 contacto">
                    <div class="flex ">
                        <div class="w-1/2 text-center text-white ">Instagram</div>
                        <div class="w-1/2 text-center text-white ">

                            Facebook</div>
                    </div>
                </div>
                <div class="xs:w-full md:w-1/2 m-2">
                    <form cass>
                        <div class="flex">
                            <div class="w-1/2">
                                <label>Nombre</label>
                                <input class type="text" />
                            </div>
                            <div class="w-1/2">
                                <label>Teléfono</label>
                                <input class type="email" />
                            </div>
                        </div>
                        <div>
                            <label>Correo electrónico </label>
                            <input class type="flex-1 email" />
                        </div>
                        <label>Mensaje</label>
                        <textarea></textarea>

                        <button
                            class="rounded m-auto text-center bg-primary p-2 uppercase font-bold"
                        >
                            Enviar mensaje
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="bg-primary w-full h-16">
            <p class="w-full text-center font-bold text-1xl uppercase">
                finestetik © 2022
            </p>
        </div>


        <div class="fixed z-20 top-0 h-screen   right-0  w-full flex flex-row overflow">
            <div class="bg-black/40 backdrop-blur-sm  w-2/12"></div>
            <div class="bg-white w-5/6 overflow-auto">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>
