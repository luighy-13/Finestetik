export default {
    data() {
      return {
        tableData: [],
        modal: {
            id:0,
            title:'',
            show:false,
            name:'',
            email:'',
            phone: '',
            rol: '',
            is_customer: 0,
            password: '',
            password_confirm: ''

        },
        rols:[],
        search: '',
      }
    },
    methods: {

      cleanForm()
      {
        this.modal= {
          id:0,
          title:'',
          show:false,
          name:'',
          email:'',
          phone: '',
          rol: '',
          is_customer: 0,
          password: '',
          password_confirm: ''

      }
      },
      openModal(title){
        this.cleanForm()

        this.modal.title = title
        this.modal.show = true

      },
      save()
      {
        let uri = '/auth/register', scope = this;
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
            email: row.email,
            phone: row.phone,
            rol: row.rol_id,
            password: row.password,
            password_confirm: row.password,
            is_customer: 0,
        }

      },
      handleDelete(index, row) {

        let uri  = '/auth/delete-user', scope = this;
        this.axios.post(uri,row).then(function(res){
          scope.getData()
        }).catch(function(res){

        })

      },
      getData()
      {
        let uri = '/auth/users', scope = this;
        this.axios.get(uri).then(function(res){
          scope.tableData = res.data.data
        }).catch(function(res){

        })
      },
      getRols(){
        let uri = '/users/rol/show', scope = this;
        this.axios.get(uri).then(function(res){
          scope.rols = res.data.data
        }).catch(function(res){

        })
      }
    },
    mounted()
    {
      this.getRols()
      this.getData()
    }
  }
