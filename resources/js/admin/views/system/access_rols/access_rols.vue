<script src="./access_rols.js"></script>

<template>
    <div class="pt-2 pl-2 pr-2">
        <h2 class="text-3xl font-bold text-gray-600">Permisos</h2>

        <div class="w-1/2 flex searcher">
            <input placeholder="Buscar" type="text">
            <button ><i class="fas fa-search"></i></button>
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
            <el-table-column label="Descripción" prop="description">
            </el-table-column>
            <el-table-column align="right">
                <template slot="header">
                    <el-input
                        v-model="search"
                        size="mini"
                        placeholder="Buscar"
                    />
                </template>
                <template slot-scope="scope">
                    <!-- <el-button
                        size="mini"
                        icon="el-icon-edit"
                        @click="handleEdit(scope.$index, scope.row)"
                        >Editar</el-button
                    > -->
                    <btn-validator
                        btn_func="edit"
                        type=""
                        icon="el-icon-edit"
                        text="Editar"
                        :func="
                            () => {
                                handleEdit(scope.$index, scope.row);
                            }
                        "
                    ></btn-validator>
                </template>
            </el-table-column>
        </el-table>

        <el-dialog :modal="false"  :title="modal.title" :visible.sync="modal.show">
            <!-- <p>{{modal}}</p> -->
            <template v-for="(modules, index) in modal.modules">
                <div :key="index">
                    <label>
                        <strong>{{ modules.name }}</strong></label
                    >
                    <br />
                    <div class="ml-2">
                        <el-checkbox
                            v-for="(children, i) in modules.childrens"
                            :key="i"
                            v-model="children.status"
                            @change="
                                changeStatus(
                                    modal.id,
                                    children.id,
                                    children.status
                                )
                            "
                            >{{ children.name }}</el-checkbox
                        >
                    </div>
                </div>
            </template>
        </el-dialog>
    </div>
</template>

<style lang="sass" scoped>
@import './access_rols.sass'
</style>
