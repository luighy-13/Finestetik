<script src="./users.js"></script>

<template>
    <div class="pt-2 pl-2 pr-2">
        <h2 class="text-3xl font-bold text-gray-600">Usuarios</h2>

        <div class="w-1/2 flex searcher">
            <input placeholder="Buscar" type="text">
            <button ><i class="fas fa-search"></i></button>
        </div>

        <div class="text-right">

            <btn-validator btn_func="write" type="primary" icon="el-icon-plus" text="Nuevo Usuario" :func="()=>{openModal('Nuevo Usuario')}"></btn-validator>
        </div>
        <el-table
            :height="400"
            :data="
                tableData.filter(
                    data =>
                        !search ||
                        data.name.toLowerCase().includes(search.toLowerCase())
                )
            "
            style="width: 100%"
        >
            <el-table-column label="N°" type="index"> </el-table-column>
            <el-table-column label="Nombre" prop="name"> </el-table-column>
            <el-table-column label="Email" prop="email"></el-table-column>
            <el-table-column label="Teléfono" prop="phone"></el-table-column>
            <el-table-column align="right">
                <template slot="header" slot-scope="scope">
                    <el-input
                        v-model="search"
                        size="mini"
                        placeholder="Buscar"
                    />
                </template>
                <template slot-scope="scope">
                    <btn-validator btn_func="edit" type=""       icon="el-icon-edit"         text="Editar" :func="()=>{handleEdit(scope.$index, scope.row)}"></btn-validator>
                    <btn-validator btn_func="delete" type="danger" icon="el-icon-delete-solid" text="Eliminar" :func="()=>{handleDelete(scope.$index, scope.row)}"></btn-validator>

                    <!-- <el-button
                        size="mini"
                        icon="el-icon-edit"
                        @click="handleEdit(scope.$index, scope.row)"
                        >Editar</el-button
                    >
                    <el-button
                        size="mini"
                        type="danger"
                        icon="el-icon-delete-solid"
                        @click="handleDelete(scope.$index, scope.row)"
                        >Eliminar</el-button
                    > -->
                </template>
            </el-table-column>
        </el-table>

        <el-dialog :modal="false"  :title="modal.title" :visible.sync="modal.show" width="30%">
            <form v-on:submit.prevent="save()">
                <label for="">Nombre</label>
                <el-input v-model="modal.name"></el-input>
                <label for="">Correo</label>
                <el-input
                    v-model="modal.email"
                    type="email"
                ></el-input>
                <label>Teléfono</label>
                <el-input v-model="modal.phone" ></el-input>
                <label for="">Tipo Usuario</label>
                <el-select v-model="modal.rol">
                    <el-option v-for="(element, index) in rols" :key="index" :label="element.name" :value="element.id"></el-option>
                </el-select>
                <label for="">Contraseña</label>
                <el-input type="password" v-model="modal.password"></el-input>
                <label for="">Confirmar contraseña</label>
                <el-input type="password" v-model="modal.password_confirm"></el-input>
                <hr />
                <div class="text-center">
                    <button
                        @click="cleanForm()"
                        type="button"
                        class="btn btn-danger"
                    >
                        Cancelar
                    </button>
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </el-dialog>
    </div>
</template>

<style lang="sass" scoped>
@import './users.sass'
</style>
