export default {
    data() {
        return {
            tableData: [],
            modal: {
                id: 0,
                title: "",
                show: false,
                name: "",
                description: ""
            },
            search: ""
        };
    },
    methods: {
        cleanForm() {
            this.modal = {
                title: "",
                id: 0,
                show: false,
                name: "",
                description: ""
            };
        },
        changeStatus(id_rol, id_children, status)
        {

            var row = {id_rol, id_children, status}
            let uri = "/users/rol/change-status-permission",
            scope = this;
            this.axios
                .post(uri, row)
                .then(function(res) {
                    // scope.tableData = res.data.data;
                })
                .catch(function(res) {});
        },
        handleEdit(index, row) {
            this.cleanForm();
            this.modal = {
                title: "Editar permisos ("+ row.name+")",
                id: row.id,
                show: true,
                name: row.name,
                description: row.description,
                modules: row.permissions
            };

        },
        getData() {
            let uri = "/users/rol/show-with-permissions",
                scope = this;
            this.axios
                .get(uri)
                .then(function(res) {
                    scope.tableData = res.data.data;
                })
                .catch(function(res) {});
        }
    },
    mounted() {
        this.getData();
    }
};
