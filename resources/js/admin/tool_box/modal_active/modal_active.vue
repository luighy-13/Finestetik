<script src="./modal_active.js"></script>

<template>
    <div class="btn-validation">
        <button :class="'rounded m-auto  p-2  uppercase text-xs font-bold text-center ' + geClassButton()" :icon="icon" @click="validateUser()" ><span v-if="text !== ''">{{text}}</span></button>
        <el-dialog :modal="false" :visible.sync="visible" width="25%">
            <div class="text-justify">
                <h5 class="text-center">Autorizacion</h5>
                <div class="alert alert-warning text-center"><p>No cuentas con persmisos para realizar esta acción solicita la autorización</p></div>
                <label for="">Correo</label>
                <el-input></el-input>
                <label for="">Contraseña</label>
                <el-input></el-input>
                <div class="mt-2 text-center">
                    <el-button type="success" size="">Autorizar</el-button>
                </div>

            </div>

        </el-dialog>
    </div>
</template>


<style lang="sass" scoped>
    @import "./modal_active.sass"
</style>
