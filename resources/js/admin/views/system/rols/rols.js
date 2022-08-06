export default {
    data() {
      return {
        tableData: [],
        modal: {
            id:0,
            title:'',
            show:false,
            name:'',
            description:'',
            delete:0,
            edit: 0,
            write:0
        },
        search: '',
      }
    },
    methods: {

      cleanForm()
      {
        this.modal= {
            title: '',
            id: 0,
            show:false,
            name:'',
            description:'',
            delete:0,
            edit: 0,
            write:0

        }
      },
      openModal(title){
        this.cleanForm()

        this.modal.title = title
        this.modal.show = true

      },
      save()
      {
        let uri = '/users/rol/add-edit', scope = this;
        this.axios.post(uri, this.modal).then(function(res){
          scope.cleanForm()
          scope.getData()
        }).catch(function(res){

        })
      },
      handleEdit(index, row) {
        this.cleanForm()
        this.modal= {
            title: "Editar Rol",
            id: row.id,
            show:true,
            name:row.name,
            description:row.description,
            delete:row.delete == 1 ? true : false,
            edit:  row.edit == 1 ? true : false,
            write: row.write == 1 ? true : false
        }

      },
      handleDelete(index, row) {
        let uri  = '/users/rol/delete', scope = this;
        this.axios.post(uri,row).then(function(res){
          scope.getData()
        }).catch(function(res){

        })
      },
      getData()
      {
        let uri = '/users/rol/show', scope = this;
        this.axios.get(uri).then(function(res){
          scope.tableData = res.data.data
        }).catch(function(res){

        })
      }
    },
    mounted()

 {
      this.getData()
    }
  }
