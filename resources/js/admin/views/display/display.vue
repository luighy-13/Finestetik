<script src="./display.js"></script>

<template>
    <div>
        <div class="pt-2 pl-2 pr-2">
            <p class="text-3xl font-bold text-gray-600">Monitor de ventas</p>

            <div class="w-1/2 flex searcher">
                <input placeholder="Buscar" type="text">
                <button ><i class="fas fa-search"></i></button>
            </div>

            <div class="grid grid-cols-4 gap-1 mt-2">
                <div class="shadow bg-white rounded p-2 " v-for="(element, index) in surgeris" :key="index">
                    <p class="font-bold text-gray-600 text-center ">{{element.folio}}</p>
                    <div class="flex flex-wrap">
                        <p>Cliente</p>
                    </div>
                    <div class="flex flex-wrap">
                        <p>ID Cliente</p>
                    </div>

                    <div class="flex flex-wrap">
                        <p>Operación</p>
                    </div>
                    <div class="flex flex-wrap">
                        <p>Doctor</p>
                    </div>
                    <div class="flex flex-wrap mt-2">
                        <p class="w-1/2">Prestamo</p>
                        <p class="w-1/2 text-right">$ {{element.payeds_in_months * element.payed_mounth}}</p>
                    </div>
                    <div class="flex flex-wrap">
                        <p class="w-1/2">Total a pagar</p>
                        <p class="w-1/2 text-right">$ {{element.total_debt}}</p>
                    </div>
                    <div class="flex flex-wrap">
                        <p class="w-1/2">Enganche</p>
                        <p class="w-1/2 text-right">$ {{element.deposit}}</p>
                    </div>
                    <div class="flex flex-wrap">
                        <p class="w-1/2">Mensualidad</p>
                        <p class="w-1/2 text-right">$ {{element.payed_mounth}}</p>
                    </div>
                    <div class="flex flex-wrap">
                        <p class="w-1/2">Plazo</p>
                        <p class="w-1/2 text-right">{{element.payeds_in_months}} meses</p>
                    </div>

                    <div class="flex flex-wrap mt-2">
                        <p class="w-1/2">Fecha Inicio</p>
                        <p class="w-1/2 text-right"> - </p>
                    </div>
                    <div class="flex flex-wrap">
                        <p class="w-1/2">Fecha Limite de Pago</p>
                        <p class="w-1/2 text-right"> - </p>
                    </div>
                    <div class="flex flex-wrap">
                        <p class="w-1/2">Fecha Operacion</p>
                        <p class="w-1/2 text-right"> - </p>
                    </div>

                    <div class="flex flex-wrap mt-2">
                        <p class="w-1/2">Pagado</p>
                        <p class="w-1/2 text-right"> $ </p>
                    </div>
                    <div class="flex flex-wrap">
                        <p class="w-1/2">Adeudo</p>
                        <p class="w-1/2 text-right"> $ </p>
                    </div>

                    <div class="flex flex-wrap mt-2">
                        <p class="w-1/2">Estatus</p>
                        <div class="w-1/2">
                            <button class="rounded text-center p-1 bg-orange-600 text-white w-full" v-if="element.status == 0">Inactivo</button>
                            <button class="rounded text-center p-1 bg-green-600 text-white w-full" v-if="element.status == 1">A tiempo</button>
                            <button class="rounded text-center p-1 bg-rose-600 text-white w-full" v-if="element.status == 2">Retrasado</button>
                            <button class="rounded text-center p-1 bg-primary text-white w-full" v-if="element.status == 3">Terminado</button>
                            <button class="animate-pulse rounded text-center p-1 bg-yellow-400 text-black font-bold w-full" v-if="element.status == 4">Validar Documentos</button>

                        </div>
                    </div>

                    <div class="flex flex-row flex-wrap mt-2">
                        <div class="w-1/2 p-1"> <button class="rounded text-center bg-orange-600 text-white w-full p-1">Detalle Pagos</button> </div>
                        <div class="w-1/2 p-1"> <button class="rounded text-center bg-green-600 text-white w-full p-1">Detalle Cliente</button> </div>
                        <div class="w-1/2 p-1"> <button class="rounded text-center bg-primary w-full p-1">Editar</button> </div>
                        <div class="w-1/2 p-1"> <button class="rounded text-center bg-rose-600 w-full text-white p-1">Detalle Cita</button> </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
