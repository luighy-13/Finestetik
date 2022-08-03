<script src="./surgery.js"></script>

<template>
    <div>
        <div class="pt-2 pl-2 pr-2">
            <p class="text-3xl font-bold text-gray-600">Mis cirugías</p>

            <div class="grid grid-cols-4 gap-1 mt-2">
                <div class="shadow bg-white rounded p-2 " v-for="(element, index) in surgeris" :key="index">
                    <p class="font-bold text-gray-600 text-center ">{{element.folio}}</p>
                    <div class="flex flex-wrap">
                        <p>Operación</p>
                    </div>
                    <div class="flex flex-wrap">
                        <p>Doctor</p>
                    </div>
                    <div class="flex flex-wrap">
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


                    <p class="text-center cursor-pointer text-gray-600 ">Información adicional</p>
                </div>
            </div>
        </div>
    </div>
</template>
